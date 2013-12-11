<!-- Block Content -->
<p>

<!-- Form Add Page with Blocks in the Grid -->
<div class="row gutter30">

	<!-- Grid Blocks Content -->
	<div class="row gutter30">

		<div class="col-xs-9">

			<!-- Block 1 -->
			<div class="block">

				<div class="block-title"> <h4>Post Data</h4> </div>

				<p>

	                <!-- Form Content -->
       		        <form id="form-validation" class="form-horizontal" method="post">

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="post_title">Title:</label>
							<div class="col-xs-11">
                      		    <input type="text" id="post_title" name="post_title" class="form-control" placeholder="Post Title" value="<?php echo set_value('post_title'); ?>"><br />
	                        </div>
       		            </div>

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="post_type">Type:</label>
							<div class="col-xs-3">
                       		    <input type="text" id="post_type" name="post_type" class="form-control" placeholder="Post Type" value="">
	                        </div>

							<label class="col-xs-1 control-label" for="post_amount">Amount:</label>
							<div class="col-xs-3">
                       		    <input type="text" id="post_amount" name="post_amount" class="form-control" placeholder="Post Amount" value="">
	                        </div>

							<label class="col-xs-1 control-label" for="post_currency">Currency:</label>
							<div class="col-xs-3">
                       		    <input type="text" id="post_currency" name="post_currency" class="form-control" placeholder="Post Currency" value=""><br />
	                        </div>
       		            </div>

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="post_pic">Picture:</label>
							<div class="col-xs-7">
                      		    <input type="text" id="post_pic" name="post_pic" class="form-control" placeholder="Post Picture" value="">
	       		            </div>

							<label class="col-xs-1 control-label" for="page_status">Status:</label>
							<div class="col-xs-3">
								<select id="post_active" name="post_active" class="form-control">
									<option value="">Please select</option>
									<option value="yes">yes</option>
									<option value="no">no</option>
								</select><br />
	                        </div>
       		            </div>

						<!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
						<!-- More info can be found at http://ckeditor.com -->
						<div class="form-group">
							<label class="col-xs-1 control-label" for="textarea-ckeditor">Post Content:</label>
							<div class="col-xs-11">
								<textarea id="post_content" name="post_content" class="ckeditor"></textarea><br />
							</div>
						</div>

               		    <div class="form-group">
                       		<button type="submit" class="btn btn-primary" name="add" value="add"><i class="fa fa-power-off"></i> Add Post</button>
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

				<div class="block-title"><h4>Post Options</h4></div>

				<p>


				</p>

			</div>
			<!-- END Block 2 -->

		</div>

	</div>
	<!-- END Grid Blocks -->

</div>
<!-- END Row -->

</p>
<!-- END Block Content -->