<!-- Block Content -->

<!-- Form with Blocks in the Grid -->
<div class="row gutter30">

	<div class="col-xs-9">

		<!-- Block 1 -->
		<div class="block">

			<div class="block-title"> <h4>Comment Data</h4> </div>

			<p>

                <!-- Form Content -->
				<form id="form-validation" class="form-horizontal" method="post">

                    <div class="form-group">
						<label class="col-xs-1 control-label" for="comment_user_name">User name:</label>
						<div class="col-xs-2">
							<input type="text" id="comment_user_name" name="comment_user_name" class="form-control" placeholder="User name" value="<?php echo $comment_user_name; ?>">
						</div>

						<label class="col-xs-1 control-label" for="comment_email">Email:</label>
						<div class="col-xs-2">
							<input type="text" id="comment_email" name="comment_email" class="form-control" placeholder="Email address" value="<?php echo $comment_email; ?>">
						</div>

						<label class="col-xs-1 control-label" for="comment_post_id">Post ID:</label>
						<div class="col-xs-2">
							<input type="text" id="comment_post_id" name="comment_post_id" class="form-control" placeholder="Post ID" value="<?php echo $comment_post_id; ?>">
                        </div>

						<label class="col-xs-1 control-label" for="comment_status">Status:</label>
						<div class="col-xs-2">
							<select id="comment_status" name="comment_status" class="form-control">
								<option value="">Please select</option>
								<option value="active">active</option>
								<option value="inactive">inactive</option>
							</select><br />
                        </div>
					</div>

					<!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
					<!-- More info can be found at http://ckeditor.com -->
					<div class="form-group">
						<label class="col-xs-1 control-label" for="textarea-ckeditor">Comment Content:</label>
						<div class="col-xs-11">
							<textarea id="comment_content" name="comment_content" class="ckeditor"><?php echo $comment_content; ?></textarea><br />
						</div>
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="update" value="update"><i class="fa fa-power-off"></i> Update Comment</button>
					</div>

				</form>
				<!-- END Form Content -->

			</p>

		</div>
		<!-- END Block 1 -->

	</div>

	<div class="col-xs-3">

		<!-- Block 2 -->
		<div class="block">

			<div class="block-title"><h4>Comment Options</h4></div>

			<p>


			</p>

		</div>
		<!-- END Block 2 -->

	</div>

</div>
<!-- END Grid Blocks -->

<!-- END Block Content -->