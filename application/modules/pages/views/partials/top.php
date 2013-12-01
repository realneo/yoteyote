<?php
/**
 * top.php
 *
 * Author: pixelcave
 *
 * The first block of code used in every page of the template
 * Start of html, head tag, as well as the sidebars and the header of the page are included here
 *
 */
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $template['title']; ?></title>

        <meta name="description" content="<?php echo $template['description']; ?>">
        <meta name="keywords" content="<?php echo $template['keywords']; ?>">
        <meta name="author" content="<?php echo $template['author']; ?>">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo img_url('favicon.ico'); ?>">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon57.png'); ?>" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon72.png'); ?>" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon76.png'); ?>" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon114.png'); ?>" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon120.png'); ?>" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon144.png'); ?>" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon152.png'); ?>" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- The Open Sans font is included from Google Web Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic">

        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo css_url('bootstrap.css'); ?>">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="<?php echo css_url('plugins.css'); ?>">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo css_url('main.css'); ?>">

        <!-- The main Yoteyote custom stylesheet defined in here -->
        <link rel="stylesheet" href="<?php echo css_url('yoteyote.css'); ?>">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <?php if ($template['theme']) { ?>
	        <link id="theme-link" rel="stylesheet" href="<?php echo css_url('themes/'.$template['theme'].'.css'); ?>">
        <?php } ?>

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo css_url('themes.css'); ?>">
        <!-- END Stylesheets -->

		<script type="text/javascript" charset="utf-8">
			//<![CDATA[
				var base_url  = "<?php echo base_url(); ?>";
				var site_url  = "<?php echo site_url(); ?>";
				var theme_url = "<?php echo base_url('assets/css/themes/'); ?>";
			// ]]>
		</script>

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo js_url('vendor/modernizr-2.6.2-respond-1.3.0.min.js'); ?>"></script>
    </head>

    <!-- Body -->
    <!-- In the PHP version you can set the following options from the config file -->
    <!--
        Add one of the following classes to the body element for the desirable feature:
        'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
        'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
        'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
    -->
    <?php
    $body_classes = '';

    if ($template['header'] == 'navbar-fixed-top') {
        $body_classes = 'header-fixed-top';
    } else if ($template['header'] == 'navbar-fixed-bottom') {
        $body_classes = 'header-fixed-bottom';
    }

    if ($template['navigation']) {
        $body_classes .= ' ' . $template['navigation'];
    }
    ?>
    <body<?php if ($body_classes) { echo ' class="' . $body_classes . '"'; } ?>>
        <!-- Left Sidebar -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- If you add the class .enable-hover, then a small portion of left sidebar will be visible and it can be opened with a mouse hover (> 1200px) (may affect website performance) -->
        <div id="sidebar-left"<?php if ($template['sidebar_left'] == 'enable-hover') { echo ' class="enable-hover"'; } ?>>

            <!-- Sidebar Content -->
            <div class="sidebar-content">

                <!-- Search Form -->
                <form action="<?php echo base_url('home/page_ready_search_results'); ?>" method="post" class="sidebar-search">
                    <input type="text" id="sidebar-search-term" name="sidebar-search-term" placeholder="Search..">
                </form>
                <!-- END Search Form -->

                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-left-scroll">
                    <?php if ($primary_nav) { ?>

                    <!-- Sidebar Navigation -->
                    <ul class="sidebar-nav">
                        <?php foreach ($primary_nav as $key => $link) {
                            $link_class = '';

                            // Get link's vital info
                            $url = (isset($link['url']) && $link['url']) ? $link['url'] : '#';
                            $active = (isset($link['url']) && ($template['active_page'] == $link['url'])) ? ' active' : '';
                            $icon = (isset($link['icon']) && $link['icon']) ? '<i class="' . $link['icon'] . '"></i>' : '';

                            // Check if we need to add the class active to the li element (only if a sublink is active)
                            $li_active = '';
                            $menu_link = '';

                            if (isset($link['sub']) && $link['sub']) {
                                foreach ($link['sub'] as $sub_link) {
                                    if (in_array($template['active_page'], $sub_link)) {
                                        $li_active = ' class="active"';
                                        break;
                                    }

                                    // Check and sublinks for active class if they exist
                                    if (isset($sub_link['sub']) && $sub_link['sub']) {
                                        foreach ($sub_link['sub'] as $sub2_link) {
                                            if (in_array($template['active_page'], $sub2_link)) {
                                                $li_active = ' class="active"';
                                                break;
                                            }
                                        }
                                    }
                                }

                                $menu_link = 'menu-link';
                            }

                            if ($menu_link || $active) {
                                $link_class = ' class="'. $menu_link . $active .'"';
                            }
                        ?>
                            <?php if ($url == 'header') { ?>
                            <li>
                                <h2 class="sidebar-header"><?php echo $link['name']; ?></h2>
                            </li>
                            <?php } else { ?>
                            <li<?php echo $li_active; ?>>
                                <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php echo $icon . $link['name']; ?></a>
                                <?php if (isset($link['sub']) && $link['sub']) { ?>
                                    <ul>
                                        <?php foreach ($link['sub'] as $sub_link) {
                                            $link_class = '';

                                            // Get sublink's vital info
                                            $url = (isset($sub_link['url']) && $sub_link['url']) ? $sub_link['url'] : '#';
                                            $active = (isset($sub_link['url']) && ($template['active_page'] == $sub_link['url'])) ? ' active' : '';

                                            // Check if we need add the class active to the li element (only if a sublink is active)
                                            $li2_active = '';
                                            $submenu_link = '';

                                            if (isset($sub_link['sub']) && $sub_link['sub']) {
                                                foreach ($sub_link['sub'] as $sub2_link) {
                                                    if (in_array($template['active_page'], $sub2_link)) {
                                                        $li2_active = ' class="active"';
                                                        break;
                                                    }
                                                }

                                                $submenu_link = 'submenu-link';
                                            }

                                            if ($submenu_link || $active) {
                                                $link_class = ' class="'. $submenu_link . $active .'"';
                                            }
                                        ?>
                                        <li<?php echo $li2_active; ?>>
                                            <a href="<?php echo $url; ?>"<?php echo $link_class; ?>><?php echo $sub_link['name']; ?></a>
                                            <?php if (isset($sub_link['sub']) && $sub_link['sub']) { ?>
                                                <ul>
                                                    <?php foreach ($sub_link['sub'] as $sub2_link) {
                                                        // Get vital info of sublinks
                                                        $url = (isset($sub2_link['url']) && $sub2_link['url']) ? $sub2_link['url'] : '#';
                                                        $active = (isset($sub2_link['url']) && ($template['active_page'] == $sub2_link['url'])) ? ' class="active"' : '';
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo $url; ?>"<?php echo $active ?>><?php echo $sub2_link['name']; ?></a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                    <!-- END Sidebar Navigation -->
                    <?php } ?>
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Left Sidebar -->

        <!-- Right Sidebar -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- If you add the class .enable-hover, then a small portion of right sidebar will be visible and it can be opened with a mouse hover (> 1200px) (may affect website				performance) -->
        <div id="sidebar-right"<?php if ($template['sidebar_right'] == 'enable-hover') { echo ' class="enable-hover"'; } ?>>
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- User Info -->
                <div class="user-info">
                    <div class="user-details"><a href="<?php echo base_url('home/page_special_user_profile'); ?>">pixelcave</a><br><em>Web Designer</em></div>
                    <img src="<?php echo img_url('template/avatar.png'); ?>" alt="Avatar">
                </div>
                <!-- END User Info -->

                <!-- Wrapper for scrolling functionality -->
                <div class="sidebar-right-scroll">
                    <!-- Color Themes -->
                    <div class="sidebar-section">
                        <h2 class="sidebar-header">Color Themes</h2>

                        <!-- Change Color Theme functionality can be found in main.js - templateOptions() -->
                        <ul class="theme-colors clearfix">
                            <li class="active">
                                <a href="javascript:void(0)" class="themed-background-default themed-border-default" data-theme="default" data-toggle="tooltip" title="Default"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-river themed-border-river" data-theme="<?php echo css_url('themes/river.css'); ?>" data-toggle="tooltip" title="River"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-amethyst themed-border-amethyst" data-theme="<?php echo css_url('themes/amethyst.css'); ?>" data-toggle="tooltip" title="Amethyst"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-dragon themed-border-dragon" data-theme="<?php echo css_url('themes/dragon.css'); ?>" data-toggle="tooltip" title="Dragon"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-emerald themed-border-emerald" data-theme="<?php echo css_url('themes/emerald.css'); ?>" data-toggle="tooltip" title="Emerald"></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" class="themed-background-grass themed-border-grass" data-theme="<?php echo css_url('themes/grass.css'); ?>" data-toggle="tooltip" title="Grass"></a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Color Themes -->

                    <!-- User Menu -->
                    <ul class="sidebar-nav">
                        <li>
                            <h2 class="sidebar-header">Explore</h2>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/page_special_timeline'); ?>"><i class="fa fa-clock-o"></i> Updates</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/page_special_user_profile'); ?>"><i class="fa fa-pencil-square"></i> Profile</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('home/page_special_message_center'); ?>"><i class="fa fa-envelope-o"></i> Messages</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="fa fa-cog"></i> Settings</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/'); ?>"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- END User Menu -->

                    <!-- Notifications -->
                    <div class="sidebar-section">
                        <h2 class="sidebar-header">Notifications</h2>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>2 hours ago</em></small><br>
                            PHP version updated successfully on <a href="javascript:void(0)">Server #5</a>
                        </div>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>3 hours ago</em></small><br>
                            <a href="javascript:void(0)">Game Server</a> crashed but restored!
                        </div>
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <small><em>5 hours ago</em></small><br>
                            <a href="javascript:void(0)">FTP Server</a> went down for maintenance!
                        </div>
                    </div>
                    <!-- END Notifications -->

                    <!-- Messages -->
                    <div class="sidebar-section">
                        <h2 class="sidebar-header">Messages</h2>
                        <div class="alert alert-info">
                            <small><a href="<?php echo base_url('home/page_special_user_profile'); ?>">Claire</a>, 2 minutes ago</small><br>
                            Hi John, I just wanted to let you know that.. <a href="page_special_message_center.php">more</a>
                        </div>
                        <div class="alert alert-info">
                            <small><a href="<?php echo base_url('home/page_special_user_profile'); ?>">Michael</a>, 5 minutes ago</small><br>
                            The project is moving along just fine and we.. <a href="page_special_message_center.php">more</a>
                        </div>
                    </div>
                    <!-- END Messages -->
                </div>
                <!-- END Wrapper for scrolling functionality -->
            </div>
            <!-- END Sidebar Content -->
        </div>
        <!-- END Right Sidebar -->

        <!-- Page Container -->
        <!-- In the PHP version you can set the following options from the config file -->
        <!-- Add the class .full-width for a full width page (100%, 1920px max width) -->
        <div id="page-container"<?php if ($template['page'] == 'full-width') { echo ' class="full-width"'; } ?>>
            <!-- Header -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!-- Add the class .navbar-default or .navbar-inverse for a light or dark header respectively -->
            <!-- Add the class .navbar-fixed-top or .navbar-fixed-bottom for a fixed header on top or bottom respectively -->
            <!-- If you add the class .navbar-fixed-top remember to add the class .header-fixed-top to <body> element -->
            <!-- If you add the class .navbar-fixed-bottom remember to add the class .header-fixed-bottom to <body> element -->
            <header class="navbar<?php if ($template['header_navbar']) { echo ' ' . $template['header_navbar']; } ?><?php if ($template['header']) { echo ' '. $template['header']; } ?>">
                <!-- Right Header Navigation -->
                <ul class="nav header-nav pull-right">
                    <li class="dropdown">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-cogs"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-custom pull-right">
                            <li class="dropdown-header text-center">HEADER</li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-default">Default</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-inverse">Inverse</a>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-top">Top</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-header-bottom">Bottom</a>
                                </div>
                            </li>
                            <li class="hidden-xs hidden-sm dropdown-header text-center">FULL WIDTH PAGE</li>
                            <li class="hidden-xs hidden-sm">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-fw-disable">Disable</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-fw-enable">Enable</a>
                                </div>
                            </li>
                            <li class="visible-lg dropdown-header text-center">PIN SIDEBARS</li>
                            <li class="visible-lg">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-pin-left">Pin Left</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-pin-right">Pin Right</a>
                                </div>
                            </li>
                            <li class="visible-lg dropdown-header text-center">SIDEBARS MOUSE HOVER</li>
                            <li class="visible-lg">
                                <div class="btn-group btn-group-justified btn-group-sm">
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-hover-left">Left</a>
                                    <a href="javascript:void(0)" class="btn btn-default" id="options-hover-right">Right</a>
                                </div>
                            </li>
                            <li class="visible-lg hidden-lt-ie9 dropdown-header text-center">EFFECT WHEN SIDEBARS OPEN</li>
                            <li class="visible-lg hidden-lt-ie9 text-center">
                                <div class="btn-group-vertical btn-group-sm" id="option-effects">
                                    <button class="btn btn-default" data-fx="fx-none">None</button>
                                    <button class="btn btn-default" data-fx="fx-opacity">Opacity</button>
                                    <button class="btn btn-default" data-fx="fx-move">Move</button>
                                    <button class="btn btn-default" data-fx="fx-push">Push</button>
                                    <button class="btn btn-default" data-fx="fx-rotate">Rotate</button>
                                    <button class="btn btn-default" data-fx="fx-push-move">Push and Move</button>
                                    <button class="btn btn-default" data-fx="fx-push-rotate">Push and Rotate</button>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)" id="sidebar-right-toggle">
                            <strong>5</strong> <i class="fa fa-user"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Right Header Navigation -->

                <!-- Left Header Navigation -->
                <ul class="nav header-nav pull-left">
                    <li>
                        <a href="javascript:void(0)" id="sidebar-left-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <!-- END Left Header Navigation -->

                <!-- Header Brand -->
                <a href="<?php echo base_url('home'); ?>" class="navbar-brand">
                    <img src="<?php echo img_url('template/drop.png'); ?>" alt="YoteyoteUI">
                    <span><?php echo $template['name']; ?></span>
                </a>
                <!-- END Header Brand -->
            </header>
            <!-- END Header -->

            <!-- FX Container -->
            <!-- In the PHP version you can set the following options from the config file -->
            <!--
                All effects apply in resolutions larger than 1200px width
                Add one of the following classes to #fx-container for setting an effect to main content when one of the sidebars are opened
                'fx-none'           remove all effects (better website performance)
                'fx-opacity'        opacity effect
                'fx-move'           move effect
                'fx-push'           push effect
                'fx-rotate'         rotate effect
                'fx-push-move'      push-move effect
                'fx-push-rotate'    push-rotate effect
            -->
            <div id="fx-container"<?php if ($template['content_fx']) { echo ' class="'.$template['content_fx'].'"'; } ?>>