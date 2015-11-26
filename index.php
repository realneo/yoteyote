<?php require_once('templates/header.php'); ?>
<?php include_once('includes/want_modal_form.php'); ?>
<?php include_once('includes/will_modal_form.php'); ?>
<?php require_once('templates/side_bar.php'); ?>	
<?php require_once('templates/top_bar.php'); ?>

		<div class='row'>
			<div class='col-md-12'>
					<!--
					<div class="field_select">
						<select class="select_styled select_styled_red">
							<option value="0">Select Category</option>
							<?php
								
								$db->query('SELECT * FROM `post_categories` ORDER BY `category_name` ASC');
								$categories = $db->resultset();
								
								foreach($categories as $category){
							?>
							<option value="<?php echo 'http://localhost:8888/yoteyote_new/index.php?category_id='.$category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
							<?php } ?>
						</select>
					</div>-->
                   Sort
                    <a href="?post_type=wills" class="btn <?php if($_GET['post_type'] == 'wills'){ echo 'btn-red'; }else{ echo '';} ?> btn-left btn-acute"><span>Wills</span></a>
					<a href="?post_type=all" class="btn <?php if(!isset($_GET['post_type']) OR $_GET['post_type'] == 'all'){ echo 'btn-red'; }else{echo '';}?> btn-acute"><span>All</span></a>
					<a href="?post_type=wants" class="btn <?php if($_GET['post_type'] == 'wants'){ echo 'btn-red'; }else{echo'';} ?> btn-right btn-acute"><span>Wants</span></a>
			</div>
		</div>
       
       
        <div class="divider"></div>
		
		<div class='row'>
			<div class='col-md-12' id='posts'>
			
			<?php
				
				//Sorting Process
				if(!isset($_GET['post_type']) OR $_GET['post_type'] == 'all'){
					$db->query("SELECT * FROM `posts` ORDER BY `id` DESC");
				}elseif($_GET['post_type'] == 'wills'){
					$db->query("SELECT * FROM `posts` WHERE `post_type` = 'will' ORDER BY `id` DESC");
				}elseif($_GET['post_type'] == 'wants'){
					$db->query("SELECT * FROM `posts` WHERE `post_type` = 'want' ORDER BY `id` DESC");
				}
				
				
				$posts = $db->resultset();
				
				foreach($posts as $post){
					
					$post_title = $post['post_title'];
					$pic = $post['post_pic'];
					$post_type = $post['post_type'];
					$post_id = $post['id'];
					
					// Changing Text Color
					if($post_type == 'will'){
						$text_color = 'green_text';
						$btn_color = 'btn-green';
						$btn_text = 'Buy';
					}elseif($post_type == 'want'){
						$text_color = 'red_text';
						$btn_color = 'btn-red';
						$btn_text = 'Bid';
					}
					
					// If the picture exists
					if(file_exists("images/posts/$pic") == 1 && $pic != ''){
						$pic = "<img alt='$post_title' src='images/posts/$pic' />";
					}
					
					// Getting User
					$post_user_id = $post['post_user_id'];
					$db->query("SELECT * FROM `users` WHERE `id` = '$post_user_id'");
					$users = $db->resultset();
					
					foreach($users as $user){
						$user_first_name = $user['first_name'];
						$user_last_name = $user['last_name'];
						$user_mobile = $user['user_mobile'];
					}
					
			?>
			<div class='boxed post'>
				<!--<div class='badge post_badge'></div> -->
                <div class='col-md-12 text-center post_title'><h5><span class='bolder-text <?php echo $text_color; ?>'>I <?php echo $post['post_type']; ?></span> <?php echo $post_title; ?></h5></div>
                <div class='col-md-12 post_amount'><h4><span class="label label-default currency"><?php echo $post['post_currency']; ?></span> <?php echo number_format($post['post_amount']); ?></h4></div>
                <?php echo $pic ; ?>
                <div class='col-md-12'><p><?php echo $post['post_content']; ?></p></div>
               
                <div class="col-md-12">
					<img alt="" src="images/users/default.png" class='post_profile_pic'>
					<div class='user_info'>
						<p>
							<strong><?php echo $user_first_name. " " . $user_last_name; ?></strong><br />
							<!--Trusted By <span class='round-badge orange_bg'>12</span><br />
							Satisfied Users <span class='round-badge green_bg'>12</span><br />-->
							<?php if($session->is_user_logged_in() == true){ ?>
								<!--<a href="post_content.php?id=<?php echo $db->secure_id($post_id); ?>" class="btn <?php echo $btn_color; ?>"><span><?php echo $btn_text; ?></span></a>-->
								<p><strong>Contacts:</strong> <?php echo $user_mobile; ?> </p>
							<?php }else{ ?>
								<p>Login to Buy or Bid</p>
							<?php } ?>
						</p>
					</div>
				</div>
			</div>
			
			<?php } ?>

			</div><!-- col-md-12 -->	
		</div><!--row -->

	</div><!-- col-md-9 -->

<?php include('templates/footer.php'); ?>