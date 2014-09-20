<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Users.php');
    
    $users = new Users($db);
    
    // Getting Data from the Form and Securing it
    
    $email = $users->secure_input($_POST['email']);
    $password = $users->secure_input($_POST['password']);
    
    // Check if user entered the values
        if(!$email OR !$password){
            $users->alert('warning', 'Please Enter Both Email and Password');
            header("Location:../index.php");
            return false;
        }
        
        $q = $users->login($email, $password);
    
    if($users->login($email, $password) == true){
        // Get User Data from Database
        $user_infos = $users->get_user_info($email);
        foreach($user_infos as $user_info){
            $user_id = $user_info['id'];
            $user_first_name = $user_info['first_name'];
            $user_last_name = $user_info['last_name'];
            $user_ip = $user_info['user_ip_address'];
            $user_confirmed = $user_info['user_confirmed'];
        }
        
        // Set Session from the User Database
        $session->set_user_init($user_id, $user_first_name, $user_last_name, $user_ip, $user_confirmed);
        
        // Redirect
        $users->alert('success', 'Successfully Logged In');
        header('Location:../index.php');
    }else{
        $users->alert('danger', 'Email or Password is incorrect');
        header('Location:../index.php');
    }
    
?>