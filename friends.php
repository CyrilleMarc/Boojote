<?php // Exemple 29-10 : friends.php
  require_once 'header.php';

  if (!$loggedin) die("</div></body></html>");

  if (isset($_GET['view'])) $view = sanitizeString($_GET['view']);
  else                      $view = $user;

  if ($view == $user)
  {
    $name1 = $name2 = "Vos";
    $name3 =          "Vous";
  }
  else
  {
    $name1 = "<a data-transition='slide'
              href='members.php?view=$view&r=$randstr'>$view</a>'s";
    $name2 = "$view :";
    $name3 = "$view";
  }

  // Ôtez le commentaire de cette ligne pour afficher le profil d'utilisateur
  // showProfile($view);

  $followers = array();
  $following = array();

    $result = queryMysql("SELECT * FROM friends WHERE user='$view'");

  $j = 0;
  while ($row = $result->fetch())
  {
    $followers[$j] = $row['friend'];
    $j++;
  }

  $result = queryMysql("SELECT * FROM friends WHERE friend='$view'");

  $j = 0;
  while ($row = $result->fetch())
  {
    $following[$j] = $row['user'];
    $j++;
  }

  $mutual    = array_intersect($followers, $following); // Amis mutuels
  $followers = array_diff($followers, $mutual);         // Suiveurs non mutuels
  $following = array_diff($following, $mutual);         // Suivis non mutuels
  $friends   = FALSE;

  echo "<br>";
  
  if (sizeof($mutual))
  {
    echo "<span class='subhead'>$name2 amis réciproques</span><ul>";
    foreach($mutual as $friend)
      echo "<li><a data-transition='slide'
            href='members.php?view=$friend&r=$randstr'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($followers))
  {
    echo "<span class='subhead'>$name2 suiveurs</span><ul>";
    foreach($followers as $friend)
      echo "<li><a data-transition='slide'
            href='members.php?view=$friend&r=$randstr'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (sizeof($following))
  {
    echo "<span class='subhead'>$name3 suivez</span><ul>";
    foreach($following as $friend)
      echo "<li><a data-transition='slide'
            href='members.php?view=$friend&r=$randstr'>$friend</a>";
    echo "</ul>";
    $friends = TRUE;
  }

  if (!$friends) echo "<br>Vous n'avez pas encore d'ami.";
?>
    </div><br>
  </body>
</html>
