<?php
session_start();
include 'db_conn.php';
$user_id = $_SESSION['user_id'];

if(!isset($_SESSION['pic_name'])){
    $pic = NULL;
}else{
    $pic = $_SESSION['pic_name'];
}

$q = mysql_query("UPDATE `users` SET `pic` = '$pic' WHERE `user_id` ='$user_id'");

if($q == TRUE){
    echo 'success';
}else{
    echo 'failed';
}

?>