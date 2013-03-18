<?php
    session_start();
    include('db_conn.php');
    if(isset($is_ajax) && $is_ajax){
            $email = mysql_real_escape_string($_REQUEST['email']);
            $password = mysql_real_escape_string($_REQUEST['password']);
            $q = mysql_query("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
            if(mysql_num_rows($q)>0){
                    $_SESSION['id'] = $user_id;
                    $_SESSION['first_name'] = $first_name;
                    $_SESSION['last_name'] = $last_name;
                    echo "success";
            }else{
                    echo 'failed';
            }
    }
?>