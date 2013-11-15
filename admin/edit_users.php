<?php 
$message="";
include("header.php");
include("sidebar.php");

		$admin =   $main->load_model("Admin");			
		$name="submit";

if(isset($_GET['mod']) && $_GET['mod']=='edit')
{
		$name="update";
		
		$id=$_GET['id'];
		
		$row=$admin->getUsersInfo($id);

}
?>


<section id="main" class="column">
    <?
		
    	
	    if(isset($_GET['message'])) { $admin->show_bar(1,$_GET['message']);    }
		
		
		if(isset($_POST['update']))
		{
			
			
			$message=$admin->getUpdateUsers($_POST, $_FILES,$id);
			
			if($message !='')
			{
			
				$admin->show_bar(0,$message);
			}
		}

	?>
	<h4 class="alert_info">Welcome to the yoteyote Admin Panel</h4>
    
		<article class="module width_full">
			<header><h3>yoteyote DASHBOARD</h3></header>
			
				
						<fieldset>
                        	<form action="#" enctype="multipart/form-data" method="post">
							
                            <label>First Name</label></br>
                            <input type="text" name="fname" class="fname" value="<?=$row['first_name']?>" size="80">
                            </br></br>
                            <label>Last Name</label></br>
                            <input type="text" name="lname" class="lname" value="<?=$row['last_name']?>" size="80">
                            </br></br>
                            <label>Password</label></br></br>
                            <input type="password" name="pwd" class="pwd" value="" size="119" style="margin-left:13px">
                            </br></br>
                            <label>Email</label></br></br>
                            <input class="email" type="email" name="email" value="<?=$row['email']?>" size="119" style="margin-left:13px">
							</br></br>
                            <label>Mobile</label></br>
                            <input class="mobile" type="text" name="mobile" value="<?=$row['mobile']?>" size="80">
							</br></br>
                            <label>Bank</label></br>
                            <input class="bank" type="text" name="bank" value="<?=$row['bank']?>" size="80">
							</br></br>
                            <label>Picture</label></br>
                            <input id="pic" type="file" name="pic" value="" size="80" style="margin-left:13px">

                            </br></br>
                            <input type="submit" value="<?=$name?>" name="<?=$name?>" valign="right" style="margin-left:13px">
							</form>
						</fieldset>
						
                        <div class="clear"></div>
				
		</article>
		
<?php 
 include("footer.php");
 ?>