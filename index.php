<?php require_once('templates/header.php'); ?>
<?php include_once('includes/want_modal_form.php'); ?>
<?php include_once('includes/will_modal_form.php'); ?>
<?php require_once('templates/side_bar.php'); ?>
<?php require_once('templates/top_bar.php'); ?>
<?php require('lib/classes/Posts.php'); ?>

		<div class='row'>
			<div class='col-md-12'>
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
					</div>

					Sort
          <a href="#" class="btn btn-left btn-acute sort_btn"><span>Wills</span></a>
					<a href="#" class="btn btn-acute sort_btn"><span>All</span></a>
					<a href="#" class="btn btn-right btn-acute sort_btn"><span>Wants</span></a>
			</div>
		</div>
		<div class="divider"></div>

		<div class='row'>
			<div class='col-md-12' id='posts'>

			</div><!-- col-md-12 -->
		</div><!--row -->

	</div><!-- col-md-9 -->

<?php include('templates/footer.php'); ?>
