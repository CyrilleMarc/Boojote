<!DOCTYPE html> <!-- Exemple 29-3 : setup.php -->
<html> 
  <head>
    <title>Préparation base de données</title>

  </head>
  <body>

    <h3>Préparation...</h3>

<?php
  require_once 'functions.php';

  // Table des membres
  createTable('members',
              'user VARCHAR(16),
              pass VARCHAR(16),
              INDEX(user(6))');

  // Table des messages
  createTable('messages', 
              'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              auth VARCHAR(16),
              recip VARCHAR(16),
              pm CHAR(1),
              time INT UNSIGNED,
              message VARCHAR(4096),
              INDEX(auth(6)),
              INDEX(recip(6))');

  // Table des amis
  createTable('friends',
              'user VARCHAR(16),
              friend VARCHAR(16),
              INDEX(user(6)),
              INDEX(friend(6))');

  // Table des profils de membres
  createTable('profiles',
              'user VARCHAR(16),
              text VARCHAR(4096),
              INDEX(user(6))');
?>

    <br>...Terminé.
  </body>
</html>
