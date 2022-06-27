<?php
    if($loggedin = TRUE){
        header("location: ./dormir.php");
    }
    else{
        header("location: ./signup.php");
    }


?>


