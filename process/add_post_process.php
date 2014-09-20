<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Posts.php');
    
    $posts = new Posts($db);
    
    // Getting & Securing Data from the Form
    $title = $posts->secure_input($_POST['post_title']);
    $content = $posts->secure_input($_POST['post_content']);
    $category_id = $_POST['category_id'];
    $currency = $_POST['post_currency'];
    $amount = $posts->secure_input($_POST['post_amount']);
    $type = $_POST['post_type'];
    $terms = $_POST['post_terms'];
    $user_id = $_SESSION['user_id'];
    
    // Check if Data is filled in
    if(!$terms){
        $posts->alert('warning', 'Please Read and Accept our Terms & Conditions');
        header("Location:../index.php");
        return false;
    }elseif(!$title){
        $posts->alert('warning', 'Please fill in the Title Field');
        header("Location:../index.php");
        return false;
    }elseif(!$content){
        $posts->alert('warning', 'Please fill in the Description Filed');
        header("Location:../index.php");
        return false;
    }elseif(!$category_id){
        $posts->alert('warning', 'Please Select a Category');
        header("Location:../index.php");
        return false;
    }elseif(!$currency){
        $posts->alert('warning', 'Please Select Currency');
        header("Location:../index.php");
        return false;
    }
    
    // Adding a Post
    
    $query = $posts->add_post($user_id, $type, $title, $content, $category_id, $currency, $amount);

    if($query == true){
        $posts->alert('success', 'Successfully Added a new post');
        header("Location:../index.php");
    }else{
        $posts->alert('danger', 'There was a system error, please try again');
        header("Location:../index.php");
    }
?>