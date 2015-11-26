<div class='col-md-2'>
	<div class="widget-container widget_avatar boxed">
		<a href='index.php' class='logo'><img src='images/logo.png' alt='Yoteyote'>
		<h1 class='logo_text'>Yoteyote</h1>
		</a>
	</div>

    
	<div class="widget_avatar boxed">
			
			<?php
				// Check if user is Logged In
				if($session->is_user_logged_in() == false){
			?>
				<div class='inner'>
					
					<h6 class='text-center'>Login</h6>
					<hr />
					<p><a href='signup.php'>Sign Up</a> if you don't have an account</p>
					<form name='signin' action='process/login_process.php' method='post'>
						<label for='email'>Email</label>
						<p><input type="text" name="email" id="email" placeholder="Enter Email"></p>
						<label for='password'>Password</label>
						<p><input type="password" name="password" id="password" placeholder="Enter Password"></p>
						<span class="btn btn-red"><input type="submit" value="Login" /></span>
					</form>
				</div><!-- inner -->
			
			
			<?php	}else{ ?>
			
			<div class="inner">
				<h5><?php echo $_SESSION['user_first_name'] ."<br /> ". $_SESSION['user_last_name']; ?></h5>
				<!--<span class="subtitle">Comedy actors</span>
				<div class="avatar">
					<img src="images/temp/avatar.png" alt="" />
				</div>
				<div class="followers">
					<span class="counter">1489</span>
					<span>followers</span>
				</div>
				<div class="follow">
					<a href="#" class="btn btn-red">
						<span><i class="plus"></i>Follow</span>
					</a>
				</div>
				-->
				<hr>
				<a href='process/logout.php' alt='Logout' class='logout_btn'>Logout</a>
			</div><!-- inner -->
			<?php } ?>
	</div>
	<!--
	<div class='widget-container boxed'>
		<div class='inner'>
			<?php
				echo $_SESSION['user_id'];
				echo "<br />";
				echo $_SESSION['user_first_name'];
				echo "<br />";
				echo $_SESSION['user_last_name'];
				echo "<br />";
				echo $_SESSION['user_confirmed'];
				echo "<br />";
			?>
		</div>
	</div>
	-->
</div><!-- col-lg-2  Sidebar-->