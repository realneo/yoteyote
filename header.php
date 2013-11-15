<?php
    require_once('lib/Main.php');
    $main = new Main();
    $main->initSession();


    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = false;
    }
?>

<!DOCTYPE HTML>
<html>
    <head>
		<meta charset="utf-8" />

		<!--<base href="http:">-->

        <title>Yoteyote | Lets Work Together</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <?php
            //$main->iCSS('toastr');
            $main->iCSS('bootstrap');
            $main->iCSS('bootstrap-responsive');
            $main->iCSS('main');
            $main->iCSS('custom');

            $main->iJS('jquery-1.8.3.min');
            $main->iJS('jquery-ui-1.9.2.custom');
            $main->iJS('functions');
            $main->iJS('main');

            //$main->iJS('toastr');
            $main->iJS('bootstrap');

            $main->iJS('pekeUpload');

            // Layout
            $main->iJS('jquery.shapeshift.min');

            // Notification
            $main->iJS('owl/notification');
            $main->iCSS('owl/main');
            $main->iJS('jquery.sticky');

            // Bootstrap Editable
            $main->iJS('bootstrap-editable/js/bootstrap-editable.min');
            $main->iCSS('bootstrap-editable/css/bootstrap-editable');

            // Side Panel
            $main->iJS('slidePanel/js/jquery.slidepanel');
            $main->iCSS('slidePanel/css/jquery.slidepanel');

            //Combodate
            $main->iJS('moment.min');
        ?>
    </head>
    <body >
    <?php
        include('includes/new_will.php');
        include('includes/new_want.php');
    ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="span2"><a href='index.php'><img src='images/logo.png' alt='Yoteyote'/></a></div>
                <div class="span10">
                    <h1 class="red_color">Yoteyote</h1>
                    <h4>Buy & Sell small jobs from one another <a class='btn btn-danger' id='discover_btn' href="includes/how_it_works.php">Discover how</a> </h4>
                </div>
            </div>
            <div class='span4 offset2 padding-top10' id="posts_create">
                <form name='will_form' action='' method='post'>
                    <p>Create New Post</p>
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#will_modal">I Will</button>
                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#want_modal" >I Want</button>
                </form>
            </div>
        </div>
    </div>
    <div id="top_bg"><img src='images/top_bg.png' alt=''/></div><!-- top_bg -->