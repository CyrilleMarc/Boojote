<?php // Exemple 29-6 : checkuser.php
  require_once 'functions.php';

  if (isset($_POST['user']))
  {
    $user   = sanitizeString($_POST['user']);
    $result = queryMysql("SELECT * FROM members WHERE user='$user'");

    if ($result->rowCount())
      echo  "<span class='taken'>&nbsp;&#x2718; " .
            "Le nom d'utilisateur '$user' existe déjà</span>";
    else
      echo "<span class='available'>&nbsp;&#x2714; " .
           "Le nom d'utilisateur '$user' est disponible</span>";
  }
?>
