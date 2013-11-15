<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-default">
	  	<div class="panel-heading"><h3 class="panel-title">User Login.</h3></div>

		<form method="POST" class="form-horizontal" role="form">
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<label for="user_name" class="col-lg-5 control-label">User name:</label>
						<div class="col-lg-7">
							<input type="text" class="form-control" id="user_name" name="user_name" placeholder="User name" value="<?php echo set_value('user_name'); ?>"><?php echo form_error('user_name'); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="user_password" class="col-lg-5 control-label">Password:</label>
						<div class="col-lg-7">
							<input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" value="<?php echo set_value('user_password'); ?>"><?php echo form_error('user_password'); ?>
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-offset-5 col-lg-7">
							<div class="checkbox">
								<label>
									<input type="checkbox" id="user_remember_me" name="user_remember_me" value="1" <?php echo set_checkbox('user_remember_me', '1', FALSE); ?>> Remember me.
								</label>
							</div>
						</div>
					</div>

					<hr />

					<div class="form-group">
						<div class="col-lg-offset-5 col-lg-7">
							<button type="submit" class="btn btn-primary" name="login" value="Login">Login</button>
						</div>
					</div>
				</fieldset>
			</div>
		</form>

	</div>
</div>

<div class="col-lg-3"></div>