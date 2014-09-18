<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Users.php');
    
    $users = new Users($db);

    // Getting Data from Input
    $email = $users->secure_input($_POST['email']);
    $re_email = $users->secure_input($_POST['email2']);
    $password = $users->secure_input($_POST['password']);
    $password2 = $users->secure_input($_POST['password2']);
    $first_name = $users->secure_input($_POST['first_name']);
    $last_name = $users->secure_input($_POST['last_name']);
    
    // Check if Both Emails are Set
    if(!$email && !$re_email){
        $users->alert('warning', 'Please Enter Both Emails');
        header("Location: ../signup.php");
        break;
    
    // Check if Both First Name and Last Name are Set
    }elseif(!$first_name && !$last_name){
        $users->alert('warning', 'Please Enter Both your First Name and Last Name');
        header("Location: ../signup.php");
        break;
    
    // Check if Both Passwords are set
    }elseif(!$password && !$password2){
        $users->alert('warning', 'Please Enter Both Password Fields');
        header('Location:../signup.php');
        break;
    }else{
        
        // Check if Emails Match
        if($users->check_email_match($email, $re_email) == false){
            $users->alert('warning', 'Email Entrered Do NOT Match');
            header("Location: ../signup.php");
            break;
        
        // Check if User Email Exists
        }elseif($users->check_user_exists($email) == true){
            $users->alert('warning', 'This Email already has an account');
            header('Location:../signup.php');
            break;
        
        // Check if Passwords Match
        }elseif($users->check_password_match($password, $password2) == false){
            $users->alert('warning', 'Passwords do not match');
            header('Location:../signup.php');
            break;
        }else{
            
            // Add User if All the Criterias are passed
            if($users->add_user($email, $password, $first_name, $last_name) == true){
                $users->alert('success', 'Successfully Signed Up. Please Check Your Email');
                header('Location:../index.php');
                break;
            }else{
                
                // Display Error If its not successful
                $users->alert('danger', 'There was a System Error. Please Try agin or Report this Issue');
                header('Location:../signup.php');
                break;
            }
        }       
    }

?>