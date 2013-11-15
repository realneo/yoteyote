<div class="col-lg-3"></div>
<div class="col-lg-6">
	<div class="panel panel-default">

	  	<div class="panel-heading"><h3 class="panel-title">Add User</h3></div>

		<form method="post" class="form-horizontal" role="form">
			<div class="panel-body">
				<fieldset>
					<div class="form-group">
						<label for="user_name" class="col-lg-4 control-label">User name:</label>
						<div class="col-lg-8">
							<input type="text" name="user_name" class="form-control" id="user_name" placeholder="User name" value="<?php echo set_value('user_name'); ?>">
							<?php echo form_error('user_name'); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="user_password" class="col-lg-4 control-label">Password:</label>
						<div class="col-lg-8">
							<input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" value="<?php echo set_value('user_password'); ?>">
							<?php echo form_error('user_password'); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="conf_password" class="col-lg-4 control-label">Confirm:</label>
						<div class="col-lg-8">
							<input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirm Password" value="<?php echo set_value('conf_password'); ?>">
							<?php echo form_error('conf_password'); ?>
						</div>
					</div>

					<div class="form-group">
						<label for="user_email" class="col-lg-4 control-label">Email:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email" value="<?php echo set_value('user_email'); ?>">
							<?php echo form_error('user_email'); ?>
						</div>
					</div>

					<hr />

					<div class="form-group">
						<div class="col-lg-offset-2 col-lg-10">
							<button type="submit" class="btn btn-primary" name="register" value="Add">
								<span class="glyphicon glyphicon-plus"></span> Create User
					  		</button>
						</div>
					</div>
				</fieldset>
			</div> <!-- panel-body -->
		</form>
	</div> <!-- panel -->
</div> <!-- col-lg-6 -->

<div class="col-lg-3"></div>