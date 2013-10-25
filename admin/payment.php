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
			
		
			
		if(isset($_POST['searchable']))
		{
			$s		=$_POST['search'];
			$where	="where email LIKE '%$s%' or mobile LIKE '%$s%' ORDER BY user_id";
			$table	='users';
			$val	=$admin->SearchData($table,$where);	
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
			
<form action="" method="post" class="post_message">

<input type="text" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;" value="Search  User By Email or Phone#" name="search">

<input type="submit" value="search" class="btn_post_search" name="searchable">

</form>
			
		<article class="module width_3_quarter">

		<header><h3 class="tabs_involved">User Payment Module</h3>
		</header>
        	
            </br>
		<div class="tab_container"> 
            <div class="tab_content" id="tab1" style="display: block;">
			<table cellspacing="0" class="tablesorter"> 
			<thead> 
				<tr> 
    				<th class="header">Name</th>
                    <th class="header">Email</th>
                    <th class="header">Mobile</th>
                    <th class="header">Bank</th>
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
										
										<td>
										<?  echo ucfirst($data['mobile']) ?>
										</td>
										
										<td>
										<?  echo ucfirst($data['bank']) ?>
										</td>
                                        
										<td><a href="payment_process.php?mod=transc&id=<?=$data['user_id']?>"><img src="images/check.png"></a>&nbsp;&nbsp;</td> 
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