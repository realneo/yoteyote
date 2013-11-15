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

			$table='posts';
			$id=$_GET['id'];		
			$admin->delPostsData($table,$id);
			}
			
		
			
		
			
		/*pagination code start here*/ 
		$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 12;
    	$startpoint = ($page * $limit) - $limit;
        $statement = "posts ";
		$orderby="order by id DESC";
			
		$val=$admin->getVal($statement, $startpoint, $limit , $orderby);
		
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
    				<th class="header">Username</th>
                    <th class="header">Posts</th>
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
										<? 
										$username=$admin->getusername($data['user_id']);
										
										echo ucfirst($username['first_name'])." ".ucfirst($username['last_name']);
										?>
										</td>
                                        
                                        <td>
										<?  echo ucfirst($data['post']) ?>
										</td>
                                        
										<td><a href="edit_post.php?mod=edit&id=<?=$data['id']?>"><img title="Edit" src="images/icn_edit.png" /></a>&nbsp;&nbsp;<a  href="view_post.php?mod=trash&id=<?=$data['id']?>"><img title="Trash" src="images/icn_trash.png" /></a>&nbsp;&nbsp;</td> 
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