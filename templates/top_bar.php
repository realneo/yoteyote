<div class='col-md-9'>

		<div class="row">
			<div class="col-md-8 widget-container boxed">
		        <h5 class='slogan'>Buy & Sell small jobs from one another <a href="#" class="btn btn-red"><span>Discover how</span></a></h5>
		    </div><!-- col-md-9 -->

		    <div class="col-md-3 col-md-offset-1 widget-container boxed">
		    	<div class='top_btns'>
				<?php if($session->is_user_logged_in() == false){ ?>
					<p class='padding-top-10'>Login First to Create a Post</p>
				<?php }else{ ?>
	    			<span> Create </span>
	    			<a href="#" class="btn btn-green" data-toggle="modal" data-target="#i_will_modal"><span>I Will</span></a>
	    			<a href="#" class="btn btn-red" data-toggle="modal" data-target="#i_want_modal"><span>I Want</span></a>
	    		<?php } ?>
				</div>
		    </div><!-- col-md-3 -->
		   
		</div><!-- row -->