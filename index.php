<?php 
    include('header.php');
    include('menu_bar.php');
    include('main_content.php');
    //include('includes/profile.php');
 ?>
<div id='bottom_content'>
<div id='user'>
<?php
    if($user_id == false){
        echo "<p style='padding:15px' class='red_color'>Sign Up or Sign In to GET Full Access of the Yoteyote Features";
    }else{
        include('includes/logged_user.php');
    }
?>
</div><!-- user -->