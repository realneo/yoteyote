<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Users.php');

    $users = new Users($db);

    if($user_info = $users->get_user_by_id($_SESSION['user_id'])){
      echo json_encode($user_info);
    }

?>
