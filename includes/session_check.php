<?php
    session_start();
    include('db_conn.php');
    if (!$_SESSION['user_id']){
        echo "failed";
    }else{
        echo "success";
    }
?>