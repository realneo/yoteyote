<?php


    include('../lib/Main.php');
	$main  = new Main;
	$user = $main->load_model('User');
	$main->initSession();

	
				  $post_obj = $main->load_model("Post"); 
				  $post_to_id = $_SESSION['user_id']	;
					
							
				  if(isset($_GET['id']) )
				  {
				   
					$get ='*';
					$option = " AND posts.id='$_GET[id]'";
					

					$posts = $post_obj->getAllPosts($get,$orderby='posts.date',$option);
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
								</tr>
								
								
								<tr>
									<th align='left'>Title : </th>
									<td> {$post['post']} </td>
								</tr>
								
								
								<tr>
									<th align='left'>Amount : </th>
									<td> {$post['amount']} <span class='currency'>{$post['currency']}</span> </td>
								</tr>
								
								
								
								<tr>
									<th align='left'>Description : </th>
									<td> <textarea  readonly rows='5' cols='35'>{$post['description']} </textarea></td>
								</tr>
								
							
								
								
								
								<tr>
									<th colspan='2' align='middle'><span id='error_a' style='display:none' ></span></th>

								</tr>
								
								
								
								
								
								<tr>
								<td>
								</td>
								</tr>
								
								
								
								
								
								
								";
									
						
						if( ($post_to_id != $post['user_id'] )  && !$user->checkAlreadyBid($post_to_id,$_GET['id'])    )
						{
								
						$html .="
							<tr>
									<th align='left'>Amount : </th>
									<td> <input  placeholder='Bid in Tshs' type ='text' name='bid_amount' id='bid_amount'></td>
								</tr>
								
						
						<tr>
						<td colspan='2'> 
						<input type='hidden' name='post_to_id' value='$post_to_id' class='post_to_id' >
						<input type='hidden' name='post_id' value='$_GET[id]' class='post_id' >
						<button  class='add_apply_btn' name='add_apply_btn'>Bid</button>
						</td>
						</tr>";
								
						}
							
							
							
						
						 }
						 $html.="</table><div class='preloader'>
						<img height='12px' src='images/loader.gif'></div><div class='feedback'></div>";
								 
						 echo $html;
						
					}


	
?>