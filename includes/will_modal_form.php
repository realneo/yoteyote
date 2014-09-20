<div class="modal fade" id="i_will_modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   
                    <div class="modal-header green_bg">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title white_text lighter-text">Create "I Will" Post</h4>
                    </div><!-- modal-header -->
                    <form name='will_form' action='process/add_post_process.php' method='post'>
                    <div class="modal-body">
                       <div class='row'>
                           <div class='col-md-12'>
                              <div class='col-md-12'>
                                  <div class="input-group">
                                        <span class="input-group-addon green_text bolder-text">I Will</span>
                                        <input type="text" name='post_title' class="form-control" placeholder="design a logo in 24 hours" />
                                    </div>
                                    <div class="divider"></div>
                                    
                                    <textarea name='post_content' cols="55" rows="5" placeholder="Tell Us more about your post"></textarea>
                                    
                                    <div class='divider'></div>
                              </div>
                            
                               <div class='col-md-6'>

                                   <select class="select_styled" name='category_id'>
                                        <?php
					    $db->query("SELECT * FROM `post_categories`");
					    $db->execute();
					    $categories = $db->resultset();
					    
					    foreach($categories as $category){
						    echo "<option value='".$category['category_id']."'>".$category['category_name']."</option>";
					    }
					?>
                                    </select>

                                   <div class='divider'></div>

                                    <div class='col-md-6'>
                                        <p class='pull-right text-center'>Select Currency</p>
                                   </div>

                                   <div class='col-md-6'>
                                       <div class="input_styled inlinelist">
                                            <div class="pull-left">
                                                <input type="radio" name="post_currency" value="Tshs" checked='checked' id='post_currency5'>
                                                <label for="post_currency5">TSH</label>
                                                <input type="radio" name="post_currency" value="USD" id='post_currency6'>
                                                <label for="post_currency6">USD</label>
                                            </div>
                                        </div>
                                   </div>
                                   
                                    <input type="text" name='post_amount' class="form-control" placeholder="Enter Amount" />

                               </div>

                               <div class='col-md-6'>
				<!--
                                   <a href="#" class="btn btn-round "><span>Upload Picture</span></a>

                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">60%</div>
                                    </div>

				-->
                               </div>

                           </div><!-- col-md-12 -->
                       </div><!-- row -->
			<input type='hidden' value='will' name='post_type' />
                    </div><!-- modal-body -->
                    
                    <div class="modal-footer">
                        <div class="input_styled checklist">
                            <div class="rowCheckbox pull-left">
				    <input name="post_terms" type="checkbox" id="will_post_terms" value="agree" />
				    <label for="will_post_terms">I agree with the Terms &amp; Conditions</label>
			    </div>
                        </div>
			<span class="btn btn-green pull-right"><input type="submit" value="Ready" /></span>
                        <a href="#" class="btn btn-red pull-right close" data-dismiss="modal"><span>Cancel</span></a>
					</div><!-- modal-footer -->
                    </form>
                </div>
            </div>
        </div><!-- I want Modal -->