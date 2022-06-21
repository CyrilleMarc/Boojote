<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Hurricane&family=IBM+Plex+Sans+Thai+Looped:wght@300&family=Inspiration&family=Palette+Mosaic&family=Shadows+Into+Light&display=swap" 
  rel="stylesheet">
  <!-- <link rel='stylesheet' href='styles.css' type='text/css'> -->
  <title>Document</title>
</head>
<body>
  
</body>
</html><?php // Exemple 29-4 : index.php
  session_start();
  require_once 'header.php';

  echo "<div class='center'>";

  if ($loggedin) echo ", $user, vous êtes connecté.";
  else           echo '.<br>Inscrivez-vous ou connectez-vous pour nous rejoindre.';

  echo <<<_END
      </div><br>
    </div>
    <div data-role="footer">
    <div class="photos"><img  src='https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=821&q=80'>
    <img  src='pietro-de-grandi-T7K4aEPoGGk-unsplash.jpg' alt= ''>
    <img  src='simon-english-dYcypsY4i3I-unsplash.jpg'>
    <img  src='DiskuT4.jpeg' alt='Photo by Christine Roy on Unsplash'>
    </div>
  </body>
</html>
_END;
?>
