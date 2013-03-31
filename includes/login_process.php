<?php
    session_start();
    include('db_conn.php');
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = hash(sha1, $password);
    $q = mysql_query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$hashed_password'");
    while($row = mysql_fetch_array($q)){
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
        echo 'success';
    }
?>