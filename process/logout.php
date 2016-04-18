<?php
    session_start();

    session_destroy();

    if(!$_SESSION['user_id']){
      echo 'success';
    }else{
      echo 'failed';
    }
?>
