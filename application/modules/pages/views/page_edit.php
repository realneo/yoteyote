<!-- Block Content -->
<p>

<!-- Form Add Page with Blocks in the Grid -->
<div class="row gutter30">

	<!-- Grid Blocks Content -->
	<div class="row gutter30">

		<div class="col-xs-9">

			<!-- Block 1 -->
			<div class="block">

				<div class="block-title"> <h4>Page Data</h4> </div>

				<p>

	                <!-- Form Content -->
       		        <form id="form-validation" class="form-horizontal" method="post">

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="page_title">Title:</label>
							<div class="col-xs-5">
                       		    <input type="text" id="page_title" name="page_title" class="form-control" placeholder="Page Title" value="<?php echo $page_title; ?>">
							</div>

							<label class="col-xs-1 control-label" for="page_headline">Headline:</label>
							<div class="col-xs-5">
   	                   		    <input type="text" id="page_headline" name="page_headline" class="form-control" placeholder="Page Headline" value="<?php echo $page_headline; ?>"><br />
	                        </div>
       		            </div>

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="page_keywords">Keywords:</label>
							<div class="col-xs-5">
                       		    <input type="text" id="page_keywords" name="page_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo $page_keywords; ?>">
	                        </div>

							<label class="col-xs-1 control-label" for="page_description">Description:</label>
							<div class="col-xs-5">
                       		    <input type="text" id="page_description" name="page_description" class="form-control" placeholder="Meta Description" value="<?php echo $page_description; ?>"><br />
	                        </div>
       		            </div>

	                    <div class="form-group">
							<label class="col-xs-1 control-label" for="page_location">Location:</label>
							<div class="col-xs-3">
                      		    <input type="text" id="page_location" name="page_location" class="form-control" placeholder="Page Location" value="<?php echo $page_location; ?>">
	       		            </div>

							<label class="col-xs-1 control-label" for="page_type">Type:</label>
							<div class="col-xs-3">
                       		    <input type="text" id="page_type" name="page_type" class="form-control" placeholder="Page Type" value="<?php echo $page_type; ?>"><br />
	                        </div>

							<label class="col-xs-1 control-label" for="page_status">Status:</label>
							<div class="col-xs-3">
								<select id="page_status" name="page_status" class="form-control">
									<option value="">Please select</option>
									<option value="published">published</option>
									<option value="draft">draft</option>
								</select><br />
	                        </div>
       		            </div>

						<!-- CKEditor, you just need to include the plugin (see at the bottom of this page) and add the class 'ckeditor' to your textarea -->
						<!-- More info can be found at http://ckeditor.com -->
						<div class="form-group">
							<label class="col-xs-1 control-label" for="textarea-ckeditor">Page Content:</label>
							<div class="col-xs-11">
								<textarea id="page_content" name="page_content" class="ckeditor"><?php echo $page_content; ?></textarea><br />
							</div>
						</div>

               		    <div class="form-group">
                       		<button type="submit" class="btn btn-primary" name="update" value="update"><i class="fa fa-power-off"></i> Update Page</button>
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

				<div class="block-title"><h4>Page Options</h4></div>

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