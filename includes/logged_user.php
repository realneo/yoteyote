<?php
    session_start();
    include('db_conn.php');
    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $q = mysql_query("SELECT * FROM `users` WHERE `id` = '$user_id'");
    while($row = mysql_fetch_array($q)){
        $user_pic = $row['pic'];
    }
    if($user_pic == ''){
        $user_pic = 'default.png';
    }
?>
<div id='logged_user'>
<?php
    if($user_id){
        echo"
            <div id='user_pic'><img src='images/users/{$user_pic}' alt='{$first_name} {$last_name}' /></div><!-- user_pic -->
            <div id='user_name'>{$first_name} {$last_name} </div><!-- user_name -->
            <div id='user_links'>
                <a href='#'>My Settings</a>
                <a href='#'>My Listings</a>
                <a href='includes/logout_process.php' id='logout_btn'>Logout</a>
            </div><!-- user_links -->
            ";
    }
?>
</div><!-- logged_user -->