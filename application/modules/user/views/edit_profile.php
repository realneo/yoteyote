<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-brush animation-expandUp"></i>Blank<br><small>A clean page to help you start!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Blank</a></li>
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
			This is block's content..

			<!-- For notification messages. -->
			<div id="notifications">

			</div>

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

			<!-- Yoteyote content id for yoteyote main.js -->
			<div id="content">

			    <!-- Blank Content -->
		    	<p>
					Create your content..
				</p>

			</div>

		</p>
        <!-- END Block Content -->

    </div>
    <!-- END Block -->

</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- jQuery Form Validation. -->
<script>
    $(function(){
        /* For advanced usage and examples please check out
         *  Jquery Validation   -> https://github.com/jzaefferer/jquery-validation
         */

        /* Initialize Form Validation */
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

			// These are the form validation rules.
		/*
		  `id`                      int(11)      unsigned NOT NULL  AUTO_INCREMENT,  -- The profile record id
		  `profile_user_id`         int(11)      unsigned NOT NULL,                  -- The profile users id
		  `profile_first_name`      varchar(45)                     DEFAULT NULL,    -- The profile users first name
		  `profile_last_name`       varchar(45)                     DEFAULT NULL,    -- The profile users last name
		  `profile_dob`             date                            DEFAULT '0000-00-00',  -- The profile users date of birth
		  `profile_gender`          varchar(6)                      DEFAULT NULL,    -- The profile users gender
		  `profile_bio`             text,                                            -- The profile users bio
		  `profile_mobile`          varchar(15)                     DEFAULT NULL,    -- The profile users mobile phone number
		  `profile_bank`            int(11)      unsigned NOT NULL  DEFAULT '0',     -- The profile users bank
		  `profile_pic`             varchar(255)                    DEFAULT NULL,    -- The profile users pic
		  `profile_country`         varchar(255)                    DEFAULT NULL,    -- The profile users country
		  `profile_city`            varchar(100)                    DEFAULT NULL,    -- The profile users city
		  `profile_street`          varchar(100)                    DEFAULT NULL,    -- The profile users street address
		  `profile_building_name`   varchar(255)                    DEFAULT NULL,    -- The profile users building name
		  `profile_building_number` varchar(255)                    DEFAULT NULL,    -- The profile users building number
		  `profile_nickname`        varchar(255)                    DEFAULT NULL,    -- The profile users nick name
		*/

            rules: {
                val_first_name: {
                    required: true,
                    minlength: 3
                },
                val_last_name: {
                    required: true,
                    minlength: 3
                },
                val_dob: {
                    required: true,
                    minlength: 5
                },
                val_gender: {
                    required: true,
                    minlength: 5
                },
                val_bio: {
                    required: true
                },
                val_mobile: {
                    required: true,
                    url: true
                },
                val_bank: {
                    required: true
                },
                val_pic: {
                    required: true,
                    digits: true
                },
                val_country: {
                    required: true,
                    number: true
                },
                val_city: {
                    required: true
                },
                val_street: {
                    required: true
                }
                val_building_name: {
                    required: true
                },
                val_building_number: {
                    required: true,
                    digits: true
                },
                val_nickname: {
                    required: true
                },
            },
            messages: {
                val_first_name: {
                    required: 'Please enter a first name',
                    minlength: 'Your first name must consist of at least 3 characters'
                },
                val_last_name: {
                    required: 'Please enter a last name',
                    minlength: 'Your last name must consist of at least 3 characters'
                },
                val_dob: {
                    required: 'Please provide a date of birth',
                },
                val_gender: 'Please select a gender male / female!',
                val_bio: 'Please enter your bio!',
                val_mobile: 'Please enter a valid mobile phone number!',
                val_bank: 'Please enter only digits!',
                val_pic: 'Please enter a valid picture!',
                val_country: 'Please enter a valid country!',
                val_city: 'Please enter a valid city!'
                val_street: 'Please enter a valid street!'
                val_building_name: 'Please enter a valid building name!'
                val_building_number: 'Please enter a valid building number!'
                val_nickname: 'Please enter a valid nickname!'
            }
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>