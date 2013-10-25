<?php 
$message="";
$alert="";
include("header.php");
include("sidebar.php");
$admin =   $main->load_model("Admin");
		if(isset($_GET['mod']) && $_GET['mod']=='log')
		{
			$log_id 	=$_GET['id'];
			
			if($admin->transcRollBack($log_id))
				{
							
					$message.="Transaction Successfully Roll Back";
					$alert.=$admin->show_bar(1,$message,1);
				
				}
			
		}
		
?>

<section id="main" class="column">

		<?  
		
		echo $alert;
	
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
        $statement = "log ";
		$orderby="order by id DESC";
			
		$val=$admin->getVal($statement, $startpoint, $limit , $orderby);
		
	
		}
		?>
			
		<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Transaction Logs</h3>
		</header>
        	
            </br>
		<div class="tab_container"> 
            <div class="tab_content" id="tab1" style="display: block;">
			<table cellspacing="0" class="tablesorter"> 
			<thead> 
				<tr> 
    				<th class="header">Date</th>
                    <th class="header">User</th>
                    <th class="header">User Bank (+)</th>
                    <th class="header">Admin Bank (+)</th>

                    <th class="header">Actions</th> 
				</tr> 
			</thead> 
			<tbody> 
			<?  if(!empty($val))
			{

			foreach($val as $data)

			{
			 $uid=$data['user_id'];
			$table='users';
			$where="where user_id='$uid'";
			$user_data= $admin->SearchData($table,$where);	
			
			$name= ucfirst($user_data[0]['first_name'].' '.$user_data[0]['last_name']);
			
			?>
										<tr> 
										<td>
										<?  echo $data['trans_date'];?>
										</td>
										
										<td>
										<?=$name?>
										</td>
                                        
                                        <td>
										<?  echo $data['user_bank'] ?>
										</td>
										
                                        <td>
										<?  echo $data['admin_bank'] ?>
										</td>
                                        
										<td><a href="transc_log.php?mod=log&id=<?=$data['id']?>"><img title="Roll Back" width="30" height="30" src="images/undo-icon.png"></a>&nbsp;&nbsp;</td> 
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