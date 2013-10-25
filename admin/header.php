<?php 
include_once("../lib/Main.php");
include_once ('pagination/function.php');
$main  = new Main();
$admin =   $main->load_model("Admin");
$admin->chkAdminSession();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard | Admin Panel</title>
	
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <link href="pagination/css/pagination.css" rel="stylesheet" type="text/css" />
	<link href="pagination/css/grey.css" rel="stylesheet" type="text/css" />
	
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>

</head>

<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="">yoteyote Admin</a></h1>
			<h2 class="section_title">Dashboard</h2><div class="btn_view_site"><a href="#"><?=$admin->getBank()?>   <span style="color:red;font-size:10px">TSHS</span></a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			
			
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->