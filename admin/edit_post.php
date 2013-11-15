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

		$row=$admin->getPostsInfo($id);

}
?>


<section id="main" class="column">
    <?


	    if(isset($_GET['message'])) { $admin->show_bar(1,$_GET['message']);    }


		if(isset($_POST['update']))
		{


			$message=$admin->getUpdatePosts($_POST ,$id);

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
							<label>User Name</label></br>
                            <?

							$getusers=$admin->getUsers();

							?>
                            <select name="username" style="width:81%"">
                            <option value="">Select User</option>
                            <?
							$select = '';
							foreach($getusers as $ress)
							{

                             if ( $ress['user_id'] == $row['user_id'] )
                             {

								 $select="selected";

                             }
							 else
							 {
								$select = '';

							 }
							?>

                            <option <?=$select?> value="<? echo $ress['user_id']; ?>"><? echo $ress['first_name']." ".$ress['last_name']; ?></option>
                            <? }?>
                            </select>
                            <label>Enter Your Post</label></br>
                            <input type="text" name="post" class="post" value="<?=$row['post']?>" size="80">
                            </br></br>
                            <label>Description</label></br>
                            <input type="text" name="description" class="description" value="<?=$row['description']?>" size="80">
            				</br></br>
                            <label>Type</label></br>
                            <select name="user_type" style="width:81%;">
							<option value="will" <? if($row['post_type']=='will'){echo 'selected' ;}?>>Will</option>
							<option value="want"  <? if($row['post_type']=='want'){echo 'selected' ;}?>>Want</option>
							</select>
							</br></br>
                            <label>Amount</label></br>
                            <input class="amount" type="text" name="amount" value="<?=$row['amount']?>" size="80">
							</br></br>
                            <label>Currency</label></br>
                            <input class="currency" type="text" name="currency" value="<?=$row['currency']?>" size="80">
							</br></br>
                            <input type="submit" value="<?=$name?>" name="<?=$name?>" valign="right" style="margin-left:13px">
							</form>
						</fieldset>

                        <div class="clear"></div>

		</article>

<?php
 include("footer.php");
 ?>