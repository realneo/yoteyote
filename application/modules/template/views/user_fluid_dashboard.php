<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<link rel="shortcut icon" href="<?php echo ico_url('favicon.png'); ?>">

	<title>Admin Dashboard</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo css_url('bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('bootstrap-theme.css'); ?>" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo css_url('glyphicons.css'); ?>">

	<!-- Custom styles for this template -->
	<link href="<?php echo css_url('app-dashboard.css'); ?>" rel="stylesheet">

	<link href="<?php echo css_url('summernote.css'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('summernote-bs3.css'); ?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo js_url('html5shiv.js'); ?>"></script>
		<script src="<?php echo js_url('respond.min.js'); ?>"></script>
	<![endif]-->

</head>

<body>

	<!-- Wrap all page content here -->
    <div id="fluid-wrap">

		<!-- Fixed Top navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="fluid-container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="<?php echo base_url(); ?>"> Yoteyote</a>

				</div>

				<div class="navbar-collapse collapse">

					<!-- Top left navbar -->
					<ul class="nav navbar-nav">
						<li <?php echo set_active(1, '', 'home'); ?>>
							<a href="<?php echo base_url('/'); ?>"><span class="glyphicon-home"></span> Home</a>
						</li>
						<?php if (logged_in()) { ?>
							<li <?php echo set_active(1, 'profile'); ?>>
								<?php echo anchor('profile', 'Profile'); ?>
							</li>
							<?php if (user_group('owner') OR user_group('admin')) { ?>
								<li <?php echo set_active(1, 'users'); ?>>
									<?php echo anchor('users/manage', 'Users'); ?>
								</li>
							<?php } ?>
							<?php if (user_group('editor') OR user_group('owner') OR user_group('admin')) { ?>
								<li <?php echo set_active(1, 'pages'); ?>>
									<?php echo anchor('pages/manage', 'Pages'); ?>
								</li>
							<?php } ?>

							<!-- Left top navbar dropdown menu -->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Groups <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<?php if (user_group('editor') OR user_group('owner') OR user_group('admin')) { ?>
										<li <?php echo set_active(1, 'group'); ?>>
											<?php echo anchor('group/manage', 'Group'); ?>
										</li>
									<?php } ?>
									<?php if (user_group('editor') OR user_group('owner') OR user_group('admin')) { ?>
										<li <?php echo set_active(1, 'groups'); ?>>
											<?php echo anchor('groups/manage', 'User Groups'); ?>
										</li>
									<?php } ?>
								</ul>
							</li>
						<?php } ?>
					</ul>

					<!-- Top right navbar Action dropdown menu NOTE: These should never be changed! -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php if (logged_in()) { ?>
									<li><?php echo anchor('dashboard', 'Dashboard'); ?></li>
									<li class="divider"></li>
									<li><?php echo anchor('logout', 'Logout'); ?></li>
								<?php } else { ?>
									<li><?php echo anchor('login', 'Login'); ?></li>
									<li class="divider"></li>
									<li><?php echo anchor('register', 'Register'); ?></li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div> <!-- nav-collapse -->
			</div> <!-- container -->
		</div> <!-- navbar -->

	    <div class="fluid-container">

		  	<div class="row">

				<!-- The Main Content Section -->
				<div class="col-lg-12">
					<div class="panel panel-default">

						<div class="panel-heading"> Admin Dashboard. </div>

						<div class="panel-body">

							<?php
						        if ( ! isset($view_file))
								{
						            $view_file = "";
						        }

						        if ( ! isset($module))
								{
						            $module = $this->uri->segment(1);
						        }

						        if (($view_file != "") && ($module != ""))
								{
						            $path = $module."/".$view_file;
						            $this->load->view($path);
						        }
								else
								{
					    	        echo nl2br($page_content);
					        	}
					        ?>

						</div> <!-- panel body -->

						<div class="panel-footer"> &nbsp; </div> <!-- panel footer -->

					</div> <!-- panel -->
				</div> <!-- col-lg-9 -->

			</div> <!-- row -->
		</div> <!-- container -->
	</div> <!-- wrap -->

	<!-- The Footer Section -->
	<div id="fluid-footer">
		<div class="fluid-container">
			<div class="row">
				<div class="col-lg-12">
					<p class="text-muted credit">
						&copy;2009 - <?php echo date('Y'); ?>&nbsp;
						<a href="http://www.yoursite.com">Your Site.</a>&nbsp;<strong>All rights reserved Worldwide.</strong>
					</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript ----------------------------------->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo js_url('jquery-1.10.2.min.js'); ?>"></script>
	<script src="<?php echo js_url('bootstrap.min.js'); ?>"></script>

	<!-- SummerNote Text Editor -->
	<script src="<?php echo js_url('summernote-bs3.js'); ?>"></script>

	<script>
		$(document).ready(function() {
			$('#summernote').summernote({
				height: "200px"
			});
		});

		var postForm = function() {
			var page_content = $('textarea[name="page_content"]').val($('#summernote').code());
		}
	</script>

	<!-- BUG FIX: For IE 10 -->
	<script>
		if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
			var msViewportStyle = document.createElement("style")
			msViewportStyle.appendChild(
				document.createTextNode(
					"@-ms-viewport{width:auto!important}"
				)
			)
			document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
		}
	</script>

  </body>
</html>
