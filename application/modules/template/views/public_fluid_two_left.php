<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta name="description" content="<?php echo $page_description; ?>">
	<meta name="keywords" content="<?php echo $page_keywords; ?>">
	<meta name="author" content="">

	<link rel="shortcut icon" href="<?php echo ico_url('favicon.png'); ?>">

	<title><?php echo $page_title; ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo css_url('bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo css_url('bootstrap-theme.css'); ?>" rel="stylesheet">

	<!--<link rel="stylesheet" href="<?php //echo css_url('glyphicons.css'); ?>">-->

	<!-- Custom Application styles for this template -->
	<link href="<?php echo css_url('application.css'); ?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo js_url('html5shiv.js'); ?>"></script>
		<script src="<?php echo js_url('respond.min.js'); ?>"></script>
	<![endif]-->

</head>

  <body>

		<!-- Wrap all page content here -->
    <div id="fluid-wrap">

		<div class="header">
			<div class="fluid-container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

						<div class="row logo">

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 header-left">

								<div class=""><h1>Yoteyote</h1></div> <br />

								<div>

									Buy & Sell small jobs from one another.&nbsp;&nbsp;
									<a href="#" class="btn btn-danger btn-sm" role="button"> Discover how</a>
								</div>

							</div>

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Fixed Top navbar -->
		<nav class="navbar navbar-default" role="navigation">
			<div class="fluid-container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo base_url(); ?>">Yoteyote</a>
				</div>

				<!-- Left top navbar -->
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li <?php echo set_active(1, '', 'home'); ?>>
							<a href="<?php echo base_url('/'); ?>"><span class="glyphicon glyphicon-home"></span> Home</a>
						</li>
						<li <?php echo set_active(2, 'about'); ?>>
							<?php echo anchor('page/about', 'About'); ?>
						</li>
						<li <?php echo set_active(2, 'contact'); ?>>
							<?php echo anchor('page/contact', 'Contact'); ?>
						</li>
					</ul>

					<!-- Right top navbar NOTE: These should never be changed! -->
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">User <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php if (logged_in()) { ?>
									<li> <?php echo anchor('dashboard', 'Dashboard'); ?> </li>
									<li> <?php echo anchor('logout', 'Logout'); ?> </li>
								<?php } else { ?>
									<li> <?php echo anchor('login', 'Login'); ?> </li>
									<li class="divider"></li>
									<li> <?php echo anchor('register', 'Register'); ?> </li>
								<?php } ?>
							</ul>
						</li>
					</ul>
				</div> <!-- nav-collapse -->

			</div> <!-- container -->
		</nav> <!-- navbar -->


	    <div class="fluid-container">

		  	<div class="row">

				<!-- The Left Sidebar Section -->
				<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
					<div class="panel panel-default">

						<div class="panel-heading"> Panel heading without title </div>

						<div class="panel-body">
							<div id="sidebar-left" role="navigation">
								<div class="sidebar-nav">
									<ul class="nav">
										<li>Sidebar</li>
										<li class="active"><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>
										<li>Sidebar</li>
										<li><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>
										<li><a href="#">Link</a></li>
									</ul>
								</div> <!-- sidebar nav -->
							</div> <!-- sidebar -->
						</div> <!-- panel body -->

					</div> <!-- panel -->
				</div> <!-- col-lg-3 -->

				<!-- The Main Content Section -->
				<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
					<div id="panel-1" class="panel panel-default">

						<div class="panel-heading"> <?php echo $page_title; ?> </div>

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

						<div class="panel-footer"> &nbsp; </div> <!-- Panel footer -->

					</div> <!-- panel -->

				</div> <!-- col-lg-9 -->
			</div> <!-- row -->

		</div> <!-- container -->
	</div> <!-- wrap -->

	<!-- The Footer Section -->
	<div id="fluid-footer">
		<div class="fluid-container">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<p class="text-muted credit">
					&copy;2009 - <?php echo date('Y'); ?>&nbsp;
					<a href="http://www.yoursite.com">Your Site.</a>&nbsp;<strong>All rights reserved Worldwide.</strong>
				</p>
			</div> <!-- col-lg-12 -->
		</div> <!-- container -->
	</div> <!-- footer -->

	<!-- Bootstrap core JavaScript ----------------------------------->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo js_url('jquery-1.10.2.min.js'); ?>"></script>
	<script src="<?php echo js_url('bootstrap.min.js'); ?>"></script>

	<!-- base_url and site_url for Ajax calls. ----------------------->
	<script type="text/javascript" charset="utf-8">
		//<![CDATA[
			var base_url = "<?php echo base_url(); ?>";
			var site_url = "<?php echo site_url(); ?>";
		// ]]>
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