<?php


    include('../lib/Main.php');
	$main  = new Main;
	$user = $main->load_model('User');
	$main->initSession();

	
				  $post = $main->load_model("Post"); 
				  $trusted_by_id = $_SESSION['user_id']	;
					
							
				  if(isset($_GET['id']) )
				  {
				   
					$get ='*';
					$option = " AND posts.id='$_GET[id]'";
					

					$posts = $post->getAllPosts($get,$orderby='posts.date',$option);
				$html ="";
				

				
				   foreach ($posts  as $post)
				   {
						$first_name = $post['first_name'];
						$last_name = $post['last_name'];
						$mobile = $post['mobile'];
						$email = $post['email'];
						$html .= "
							<table>
								<tr>
									<th align='left'> Name : </th>
									<td> {$first_name} {$last_name} </td>
								</tr>
								<tr>
									<th align='left'> Mobile : </th>
									<td> {$mobile} </td>
								</tr>
								<tr>
									<th align='left'> Email : </th>
									<td> {$email} </td>
								</tr>";
								
								
                         if($user->checkAlreadyTrust($trusted_by_id,$user->getUserByPostID($_GET['id'])) )
						 {
								$html .="<tr>

									<td colspan='2'> 
								
									<button  disabled='disabled'  name='add_trust_btn'>
								Already Trusted
									</button>
									
									
									</td>
								</tr>";
 
							 
							 
						 }
						else if($post['user_id'] != $trusted_by_id) {
								
									$html .="<tr>
									<td colspan='2'> 
									<input type='hidden' value='$post[user_id]' class='trusted_to' >
									<button id='$trusted_by_id'  class='add_trust_btn span1 btn-warning' name='add_trust_btn'>
									Click here if you trust this person?
									</button>	
									</td>
									</tr>";
								}
							
							
							
							
						
						 }
						 $html.="</table>";
								 
						 echo $html;
						
					}


	
?>