<div class="page-header dashboard"><h4>Edit Page:</h4></div>

<form method="POST" id="postForm" class="form-horizontal" role="form" onsubmit="return postForm()">
	<fieldset>
		<div class="form-group">
			<label for="page_title" class="col-lg-1 control-label">Title:</label>
			<div class="col-lg-3">
				<?php echo form_error('page_title'); ?>
				<input type="text" name="page_title" class="form-control" id="page_title" placeholder="Page Title" value="<?php echo set_value('page_title', $page_title); ?>">
			</div>

			<label for="page_status" class="col-lg-1 control-label">Status:</label>
			<div class="col-lg-2">
				<select class="form-control" id="page_status" name="page_status">
					<option value="1"<?php echo set_select('page_status', '1', $selected_one); ?> >published</option>
					<option value="2"<?php echo set_select('page_status', '2', $selected_two); ?> >draft</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="page_keywords" class="col-lg-1 control-label">Keywords:</label>
			<div class="col-lg-8">
				<?php echo form_error('page_keywords'); ?>
				<input type="text" name="page_keywords" class="form-control" id="page_keywords" placeholder="Meta Keywords" value="<?php echo set_value('page_keywords', $page_keywords); ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="page_description" class="col-lg-1 control-label">Description:</label>
			<div class="col-lg-8">
				<?php echo form_error('page_description'); ?>
				<input type="text" name="page_description" class="form-control" id="page_description" placeholder="Meta Description" value="<?php echo set_value('page_description', $page_description); ?>">
			</div>
		</div>

		<div class="form-group">
			<label for="page_content" class="col-lg-1 control-label">Content:</label>
			<div class="col-lg-8">
				<?php echo form_error('page_content'); ?>
				<textarea id="summernote" class="form-control" name="page_content"><?php echo set_value('page_content', $page_content); ?></textarea>
			</div>

			<label for="page_rights" class="col-lg-1 control-label">Rights:</label>
			<div class="col-lg-2">
				<?php echo form_error('page_status'); ?>
				<select class="form-control" id="page_rights" name="page_rights[]" size="14" multiple="multiple">
			        <option value="1">admin</option>
			        <option value="2">owner</option>
			        <option value="3">moderator</option>
			        <option value="4">editor</option>
			        <option value="5">member</option>
			        <option value="6">user</option>
				</select>
			</div>
		</div>

		<hr />

		<div class="col-lg-9">
			<button type="submit" value="Submit" name="submit" class="btn btn-primary">Update Page</button>
		</div>
	</fieldset>
</form>
