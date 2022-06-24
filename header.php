<?php // Exemple 29-2 : header.php
  session_start();

echo <<<_INITIAL
<!DOCTYPE html> 
<html>
  <head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel='stylesheet' href='jquery.mobile-1.4.5.min.css'>
    <link rel='stylesheet' href='styles.css' type='text/css'>
    <script src='javascript.js'></script>
    <script src='jquery-2.2.4.min.js'></script>
    <script src='jquery.mobile-1.4.5.min.js'></script>

_INITIAL;

  require_once 'functions.php';

  $userstr = 'Bienvenue sur Boojote le site d\'échange de bons plans entre voyageurs.';
  $randstr = substr(md5(rand()), 0, 7);

  if (isset($_SESSION['user']))
  {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;      // Utilisateur identifié
    $userstr  = "Connecté en tant que : $user";
  }
  else $loggedin = FALSE;  // Utilisateur non identifié

echo <<<_PRINCIPAL
    <title> "Boojote member: $user"</title>
  </head>
  <body>
    <div data-role='page'>
       <div data-role='header'>
        <div><img id='title' src='./images/Boojote.jpeg'></div>
        <div class='username'>$userstr</div>
      </div>
      <div data-role='content'>

_PRINCIPAL;

  if ($loggedin)
  {
echo <<<_CONNECTE
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home'
            data-transition="slide" href='members.php?view=$user&r=$randstr'>Accueil</a>
          <a data-role='button' data-inline='true' data-icon='user'
            data-transition="slide" href='members.php?r=$randstr'>Membres</a>
          <a data-role='button' data-inline='true' data-icon='heart'
            data-transition="slide" href='friends.php?r=$randstr'>Amis</a><br>
          <a data-role='button' data-inline='true' data-icon='mail'
            data-transition="slide" href='messages.php?r=$randstr'>Messages</a>
          <a data-role='button' data-inline='true' data-icon='edit'
            data-transition="slide" href='profile.php?r=$randstr'>Mon profil</a>
          <a data-role='button' data-inline='true' data-icon='action'
            data-transition="slide" href='logout.php?r=$randstr'>Se déconnecter</a>
        </div>
        
_CONNECTE;
  }
  else
  {
echo <<<_INVITE
        <div class='center'>
          <a data-role='button' data-inline='true' data-icon='home'
            data-transition='slide' href='index.php?r=$randstr''>Accueil</a>
          <a data-role='button' data-inline='true' data-icon='plus'
            data-transition="slide" href='signup.php?r=$randstr''>S'inscrire</a>
          <a data-role='button' data-inline='true' data-icon='check'
            data-transition="slide" href='login.php?r=$randstr''>Se connecter</a>
        </div>
_INVITE;
  }
?>
