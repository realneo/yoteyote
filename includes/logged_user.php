<?php

if(isset($_GET['mode']) && $_GET['mode']=='al')
{

    include_once('../lib/Main.php');
	$main =  new Main;
	$main->initSession();
}

    $user_id = $_SESSION['user_id'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
	
	$user = $main->load_model('User');
	$row  = $user->getUser('*',"user_id ='$user_id'");
	
	
    
   
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
            <div id='user_pic'><img src='images/users/{$user_pic}' alt='{$first_name} {$last_name}' /></div><!-- user_pic -->
            <div id='user_name'>{$first_name} {$last_name} </div><!-- user_name -->
            <div id='user_links'>
                <a href='#'>My Settings</a>
                <a  id='list_btn' href='#'>My Listings (<span id='my_list'>$total</span> ) </a>
                <a  id='ongoing_btn' href='#'>My Ongoings (<span id='my_list'>$total_on</span> ) </a>
                <a href='includes/logout_process.php' id='logout_btn'>Logout</a>
                <a href='#'>Yoteyote Bank : <strong>{$bank}</strong> <span style='font-size:11px;font-weight:bold;color:#FF0000'>Tshs</span></a>    
            </div><!-- user_links -->
            ";
    }
?>
</div><!-- logged_user -->