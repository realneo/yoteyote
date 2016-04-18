<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Users.php');

    $users = new Users($db);

    // Getting Data from Input
    $email = $users->secure_input($_POST['email']);

    // Check if User Email Exists
    if($users->check_user_exists($email) == true){
      echo 'true';
    }else{
      echo 'false';
    }

?>
