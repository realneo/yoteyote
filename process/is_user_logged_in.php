<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Posts.php');

    $session = new Session($db);

    if($session->is_user_logged_in() == true){
      echo 'success';
    }else{
      echo 'failed';
    }

?>
