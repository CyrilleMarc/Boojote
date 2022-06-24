<?php 
  $dbhost = 'eu-cdbr-west-02.cleardb.net';   
  $dbdata = 'heroku_5df1c0ceda6ea59';   
  $dbuser = 'bc3b63c8491b8c';  
  $dbpass = '88c6c5f4';  
  $dbchrs = 'utf8mb4';  
  $dbattr = "mysql:host=$dbhost;dbname=$dbdata;charset=$dbchrs";
  $dbopts =
  [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
  ];
  
  try
  {
    $pdo = new PDO($dbattr, $dbuser, $dbpass, $dbopts);
  }
  catch (PDOException $e)
  {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

  function createTable($name, $query)
  {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "La table '$name' est créée ou existe déjà.<br>";
  }

  function queryMysql($query)
  {
    global $pdo;
    return $pdo->query($query);
  }

  function destroySession()
  {
    $_SESSION=array();

    if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var)
  {
    global $pdo;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    $result = $pdo->quote($var);          // Ceci ajoute des apostrophes
    return str_replace("'", "", $result); // Maintenant, supprimons-les
  }

  function showProfile($user)
  {
    global $pdo;
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float:left;'>";
    
    $result = $pdo->query("SELECT * FROM profiles WHERE user='$user'");

    if ($result->rowCount())
    {
      while ($row = $result->fetch())
      {
        echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
      }
    }
    else echo "<p>Rien à voir ici pour l'instant</p><br>";
  }
?>
