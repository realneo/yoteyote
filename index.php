<?php 
    include('header.php');
    include('menu_bar.php');
    include('main_content.php');
 ?>
<div id='bottom_content'>
<div id='user'>
<?php
    if($user_id == false){
        echo "<div id='logging_in'>             
                <a href='#' id='login_pop'>Login</a> | <a href='#' id='register_pop'>Register</a>
            </div><!-- logging_in -->";
    }else{
        include('includes/logged_user.php');
    }
?>
</div><!-- user -->

<?php include('footer.php'); ?> 