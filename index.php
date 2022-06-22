<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC&family=Hurricane&family=IBM+Plex+Sans+Thai+Looped:wght@300&family=Inspiration&family=Palette+Mosaic&family=Raleway:wght@100&display=swap" 
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
    <div class="photos"><img  src='./images/dino-reichmuth-A5rCN8626Ck-unsplash.jpg'>
    <img  src='./images/pietro-de-grandi-T7K4aEPoGGk-unsplash.jpg' alt= ''>
    <img  src='./images/simon-english-dYcypsY4i3I-unsplash.jpg'>
    <img  src='./images/DiskuT4.jpeg' alt='Photo by Christine Roy on Unsplash'>
    </div>
  </body>
</html>
_END;
?>
