<div class="page-header dashboard">
	<h4>Edit User Groups <small>Edit a the user groups</small></h4>
</div>

    <form method="POST" class="form-horizontal" role="form">
      <fieldset>
	    <div class="form-group">
		  <label for="user_id" class="col-lg-3 control-label">User ID:</label>
		  <div class="col-lg-4">
	        <?php echo form_error('user_id'); ?>
	        <input type="text" name="user_id" class="form-control" id="user_id" placeholder="User ID" value="<?php echo set_value('user_id', $user_id); ?>">
		  </div>
		</div>

	    <div class="form-group">
		  <label for="group_id" class="col-lg-3 control-label">Group ID:</label>
		  <div class="col-lg-9">
	        <?php echo form_error('group_id'); ?>
	        <input type="text" name="group_id" class="form-control" id="group_id" placeholder="Group ID" value="<?php echo set_value('group_id', $group_id); ?>">
		  </div>
		</div>

        <button type="submit" value="Submit" name="submit" class="btn btn-primary">Update</button>
      </fieldset>
    </form>
