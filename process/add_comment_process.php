<?php
    require_once('../lib/config/autoload.php');
    require_once('../lib/classes/Posts.php');
    
    $posts = new Posts($db);
    
    // Get data from form
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $post_comment = $posts->secure_input($_POST['comment']);
    
    $secured_post = $posts->secure_id($post_id);
    
    if(!$user_id){
        $posts->alert('warning', 'Login First');
        header("Location:../index.php");
        return false;
    }elseif(!$post_id){
        $posts->alert('warning', 'Select a post you want to Comment on');
        header("Location:../index.php");
        return false;
    }elseif(!$post_comment){
        $posts->alert('warning', 'The Comment is Empty');
        header("Location:../post_content.php?id=".$secured_post."#comments");
        return false;
    }else{
        if($posts->new_post_comment($post_id, $post_comment, $user_id) == true){
            $posts->alert('success', 'Successfully Commented on this Post');
            header("Location:../post_content.php?id=".$secured_post."#comments");
            return true;
        }else{
            $posts->alert('danger', 'There was a problem');
            header("Location:../post_content.php?id=".$secured_post."#comments");
            return false;
        }
    }
 
?>