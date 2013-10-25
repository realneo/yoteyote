<?php
include ("../lib/Main.php");
$main= new Main;
$user  = $main->load_model('User');







 if (isset($_POST['post_id']) && isset($_POST['post_to_id']) )
 {
	 


	 
					$post_id  =  $_POST['post_id'];
					$user_id  =$_POST['post_to_id'];
					$bid = $_POST['bid'];
					
					$res = 	$user->addList($post_id,$user_id,$bid);

					if ($res =='empty') 
					{
										
					echo 'empty';
											
					}
					else if ($res =='ok') echo 'success';
					else  echo 'fail';
					
		
	 
	
	
 }


?>