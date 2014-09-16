<?php

 session_start();
 
    unset($_SESSION['fb_token']);
    
    header("Location: test.php");
?>