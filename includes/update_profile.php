<?php
session_start();
include 'db_conn.php';
$name = $_POST['name'];
$value = $_POST['value'];
$pk = $_POST['pk'];

$q = mysql_query("UPDATE `users` SET `$name` = '$value' WHERE `user_id` ='$pk'");

if($q == TRUE){
    echo 'success';
}else{
    echo 'failed';
}

?>