<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">

    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-brush animation-expandUp"> Displayed Name</i><br>
				<small><?php echo $page_title; ?>!</small>
            </h1>
        </a>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <?php echo bread_crumbs(); ?>
    </ul>
    <!-- END Blank Header -->

    <!-- Block -->
    <div class="block">

        <!-- Block Title -->
        <div class="block-title">
			<h2><?php echo $page_title; ?></h2>
		</div>
        <!-- END Block Title -->

        <!-- Block Content -->
        <p>

			<!-- For notification messages. -->
			<div id="notifications">

			</div>

			<!-- Yoteyote content id for yoteyote main.js -->
			<div id="content">

				<?php
			        if ( ! isset($view_file))
					{
		    	        $view_file = '';
		        	}

			        if ( ! isset($module))
					{
			            $module = $this->uri->segment(1);
		    	    }

			        if (($view_file != '') && ($module != ''))
					{
			            $path = $module.'/'.$view_file;
		    	        $this->load->view($path);
		        	}
					else
					{
			            echo nl2br($page_content);
					}
				?>

			</div>

		</p>
        <!-- END Block Content -->

    </div>
    <!-- END Block -->

</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor -->
<script src="<?php echo js_url('ckeditor/ckeditor.js'); ?>"></script>


<!-----------------------------------------------
  Javascript code only for this page
  jQuery Validation for the Forms.
------------------------------------------------>

<script>
    $(function(){

        /**
         * -------------------------------------------------------------------------
		 * For advanced usage and examples please check out
         *  Jquery Validation   -> https://github.com/jzaefferer/jquery-validation
         * -------------------------------------------------------------------------
         */

        /**
		 * --------------------------------------------
		 * Initialize Form Validation
		 * --------------------------------------------
		 */

        $('#form-validation').validate({
            errorClass: 'help-block', // You can add help-inline instead of help-block if you like validation messages to the right of the inputs
            errorElement: 'div',
            errorPlacement: function(error, e) {
                e.parents('.form-group > div').append(error);
            },
            highlight: function(e){
                $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                $(e).closest('.help-block').remove();
            },
            success: function(e){
                // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
                e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                e.closest('.help-block').remove();
            },

			/**
			 * -------------------------------------------
			 * Setup form validation rules.
			 * -------------------------------------------
			 */

            rules: {
                user_name: {
                    required: true,
                    minlength: 4
                },
                user_email: {
                    required: true,
					email: true
                },
                user_password: {
                    required: true,
                    minlength: 5
                }
            },

			/**
			 * -------------------------------------------
			 * Setup form validation messages here!
			 * -------------------------------------------
			 */

            messages: {
                user_name: {
                    required: 'Please enter a User name',
                    minlength: 'Your User name must consist of at least 5 characters'
                },
                user_email: {
                    required: 'Please enter a valid Email Address!',
                },
                user_password: {
                    required: 'Please enter a Password!',
                    minlength: 'Your Password must consist of at least 5 characters'
                },
            }
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>