<?php
    include_once('lib/Main.php');
    include_once('lib/User.php');
    $main =  new Main;
    $main->initSession();

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    
    $user = $main->load_model('User');
    $row  = $user->getUser('*',"user_id ='$user_id'");	
    
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $user_pic = $row['pic'];
		
    $bank = number_format($row['bank'],2);
    
    if($user_pic == ''){
        $user_pic = 'default.png';	
    }
?>
<div id='logged_user'>
<?php
    if($user_id){
		
        $total = $user->getTotalListings($user_id);
        $total_on = $user->getTotalOn($user_id);
		
        echo"
            <div class='row-fluid'>
                <div class='span12'>
                        <div class='span1' class='profile_btn'><img src='images/posts/{$user_pic}' alt='{$first_name} {$last_name}' /></div>
                        <div class='span6 pull-left'>
                            {$first_name} {$last_name}
                            <br />
                                &nbsp;
                                &nbsp;
                                &nbsp;
                            <a href='includes/logout_process.php' class='btn btn-danger btn-small' id='logout_btn'>Logout</a>
                        </div>
                        ";
                            include('footer.php'); 
               "
                </div>
            </div>
            ";
    }
?>
</div><!-- logged_user -->