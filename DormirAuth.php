<?php
    if($loggedin = TRUE){
        header("location: ./dormir.php");
    }
    if($loggedin = FALSE){
        header("location: ./signup.php");
    }


?>


