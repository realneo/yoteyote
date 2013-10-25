<?php 
$message="";
include("header.php");
include("sidebar.php");
$admin =   $main->load_model("Admin");
?>

<section id="main" class="column">

		<?  
		
		
		if(isset($_GET['message'])) { $admin->show_bar(1,$_GET['message']);    }
		if(isset($_GET['mod']) && $_GET['mod']=='trash' )
			{

			$table='users';
			$id=$_GET['id'];		
			$admin->delUsersData($table,$id);
			}
			
		if(isset($_POST['submit']))
		{
			$id=$_POST['username'];
			$ran=$admin->getUsernameData($id);
			$user=$ran['artist_username'];
			$random=$main->getRandFileName($user , $_FILES['add_song']['name']);
			$message=$admin->InsertAudioData($_POST , $_FILES , $random);
			
			if($message =='')
			{
			$admin->show_bar(1,"New user successfully inserted ... !");
			}
			else 
			{
			$admin->show_bar(0,$message);
			}
			
			
		}
			
		if(isset($_POST['searchable']))
		{
			$s=$_POST['search'];
			$col_name="song_name";
			$table='tbl_artist_song';
			$val=$admin->SearchData($table, $col_name, $s);	
		}
		else
		{	
			
		/*pagination code start here*/ 
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 12;
    	$startpoint = ($page * $limit) - $limit;
        $statement = "users ";
		$orderby="order by user_id DESC";
			
		$val=$admin->getVal($statement, $startpoint, $limit , $orderby);
		}
		?>
			
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">user content manager</h3>
		</header>
        	
            </br>
		<div class="tab_container"> 
            <div class="tab_content" id="tab1" style="display: block;">
			<table cellspacing="0" class="tablesorter"> 
			<thead> 
				<tr> 
    				<th class="header">Name</th>
                    <th class="header">Email</th>

                    <th class="header">Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			<?  if(!empty($val))
			{

			foreach($val as $data)

			{
										
			?>
										<tr> 
										<td>
										<?  echo ucfirst($data['first_name'])." ".ucfirst($data['last_name']) ?>
										</td>
                                        
                                        <td>
										<?  echo ucfirst($data['email']) ?>
										</td>
                                        
										<td><a href="edit_users.php?mod=edit&id=<?=$data['user_id']?>"><img title="Edit" src="images/icn_edit.png" /></a>&nbsp;&nbsp;<a  href="view_users.php?mod=trash&id=<?=$data['user_id']?>"><img title="Trash" src="images/icn_trash.png" /></a>&nbsp;&nbsp;</td> 
											</tr> 
										<?  
									}
							}?>
			</tbody> 
			</table>
			</div>
            
            <?php
			if(!isset($_POST['searchable']))
			{
                    echo pagination($statement,$limit,$page);
			}?>
			</div>
		</article>
            <div class="clear"></div>
			</div>
		</article>
    <div style="height:700px"></div>
    </section>
<?php 
 include("footer.php");
 ?>