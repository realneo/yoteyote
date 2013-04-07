<?php
    session_start();
    include('db_conn.php');
    
    // Getting values from the Form
    $post = mysql_escape_string($_POST['post']);
    $description = mysql_escape_string($_POST['description']);
    $type = mysql_escape_string($_POST['type']);
    $currency = mysql_escape_string($_POST['currency']);
    $amount = mysql_escape_string($_POST['amount']);
    $f_amount = str_replace(",", "", $amount); 

    $date_time = date('Y-m-d H:i:s');
    
    $user_id = $_SESSION['user_id'];
    
    $q = mysql_query("INSERT INTO `posts` (`id`, `post`, `description`, `type`, `date`, `amount`, `currency`, `user_id`) 
        VALUES ('NULL', '$post', '$description', '$type', '$date_time', '$f_amount', '$currency', '$user_id')");
    if($q){
        echo'success';
    }else{
        echo'failed';
    }
            
?>
