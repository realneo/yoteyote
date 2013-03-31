<?php
    session_start();
    include('db_conn.php');
    
    // Getting values from the Form
    $first_name = mysql_escape_string($_POST['first_name']);
    $last_name = mysql_escape_string($_POST['last_name']);
    $email = mysql_escape_string($_POST['email']);
    $password = mysql_escape_string($_POST['password']);
    $mobile = mysql_escape_string($_POST['mobile']);
    
    // Encrypting the Password into a Hash1
    $hashed_password = hash(sha1, $password);
    
    // Formating the Input Data
    $first_name = ucfirst($first_name);
    $last_name = ucfirst($last_name);
    $date_time = date('Y-m-d H:i:s');
    
    $q = mysql_query("INSERT INTO `users` (`id`, `date`, `password`, `first_name`, `last_name`, `email`, `mobile`) 
                                   VALUES ('NULL', '$date_time', '$hashed_password', '$first_name', '$last_name', '$email', '$mobile')");
    if($q){
        echo'success';
    }else{
        echo'failed';
    }
            
?>
