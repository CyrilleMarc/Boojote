<?php // Exemple 29-11 : messages.php
  require_once 'header.php';
  
  // Si l'utilisateur n'est pas connecté, on sort.
  if (!$loggedin) die("</div></body></html>");

  // Sinon, on continue
  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if (isset($_POST['text']))
  {
    $text = sanitizeString($_POST['text']);

    if ($text != "")
    {
      $pm   = substr(sanitizeString($_POST['pm']),0,1); // Message privé
      $time = time();
      queryMysql("INSERT INTO messages VALUES(NULL, '$user',
        '$view', '$pm', $time, '$text')");
    }
  }

  if ($view != "")
  {
    // if ($view == $user)
    if (strtolower($view) == strtolower($user))
    {  // S'il s'agit de vous...
      $name1 = $name2 = "Vos";
      echo "<h3>$name1 messages</h3>";
    }
    else
    {  // ... ou d'un autre utilisateur.
      $name1 = "<a href='members.php?view=$view&r=$randstr'>$view</a>";
      $name2 = "$view -";
      echo "<h3>Messages de $name1</h3>";
    }

    showProfile($view);
    
    echo <<<_END
      <form method='post' action='messages.php?view=$view&r=$randstr'>
        <fieldset data-role="controlgroup" data-type="horizontal">
          <legend>Écrivez votre message&nbsp;:</legend>
          <input type='radio' name='pm' id='public' value='0' checked='checked'>
          <label for="public">Public</label>
          <input type='radio' name='pm' id='private' value='1'>
          <label for="private">Privé</label>
        </fieldset>
      <textarea name='text'></textarea>
      <input data-transition='slide' type='submit' value='Publier le message'>
    </form><br>
_END;

    date_default_timezone_set('UTC');

    // Section de suppression de message
    if (isset($_GET['erase']))
    {
      $erase = sanitizeString($_GET['erase']);
      queryMysql("DELETE FROM messages WHERE id='$erase' AND recip='$user'");
    }
    
    // Section d'affichage des messages
    $query  = "SELECT * FROM messages WHERE recip='$view' ORDER BY time DESC";
    $result = queryMysql($query);
    $num    = $result->rowCount();
    
    while ($row = $result->fetch())
    {
      // Section de filtrage des messages
      if ($row['pm'] == 0 || $row['auth'] == $user ||
          $row['recip'] == $user)
      { // Et affichage
        echo date('d/m \à H \h i', $row['time']);
        echo " <a href='messages.php?view=" . $row['auth'] .
             "&r=$randstr'>" . $row['auth']. "</a> ";

        if ($row['pm'] == 0)
          echo "a écrit&nbsp;: &laquo;&nbsp;" . $row['message'] . "&nbsp;&raquo; ";
        else
          echo "a chuchoté&nbsp;: <span class='whisper'>&laquo;&nbsp;" .
            $row['message']. "&nbsp;&raquo;</span> ";

        if ($row['recip'] == $user)
          echo "[<a href='messages.php?view=$view" .
               "&erase=" . $row['id'] . "&r=$randstr'>suppr.</a>]";

        echo "<br>";
      }
    }
  }

  if (!$num)
    echo "<br><span class='info'>Aucun message</span><br><br>";

  echo "<br><a data-role='button'
        href='messages.php?view=$view&r=$randstr'>Actualiser</a>";
?>

    </div><br>
  </body>
</html>
