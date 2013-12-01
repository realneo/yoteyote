<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Dashboard Header -->
    <div class="block-header">
        <div class="row remove-margin">
            <!-- Title -->
            <div class="col-md-4">
                <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
                <a href="" class="header-title-link">
                    <h1><i class="fa fa-coffee animation-expandUp"></i><?php echo $page_title; ?><br><small>Welcome <?php echo ucfirst(user_name()); ?>!</small></h1>
                </a>
            </div>
            <!-- END Title -->

            <!-- Statistics -->
            <div class="col-md-8">
                <!-- Outer Grid -->
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Inner Grid 1 -->
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="page_comp_charts.php" class="header-link">
                                    <h1 class="animation-pullDown">75<br><small>Sales Today</small></h1>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="page_comp_charts.php" class="header-link">
                                    <h1 class="animation-pullDown">$795<br><small>Profit Today</small></h1>
                                </a>
                            </div>
                        </div>
                        <!-- END Inner Grid 1 -->
                    </div>
                    <div class="col-sm-6">
                        <!-- Inner Grid 2 -->
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="page_special_timeline.php" class="header-link">
                                    <h1 class="animation-pullDown">7<br><small>Updates</small></h1>
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <a href="page_special_message_center.php" class="header-link">
                                    <h1 class="animation-pullDown">5<br><small>Messages</small></h1>
                                </a>
                            </div>
                        </div>
                        <!-- END Inner Grid 2 -->
                    </div>
                </div>
                <!-- END Outer Grid  -->
            </div>
            <!-- END Statistics -->
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-coffee"></i></li>
        <li><a href="">Dashboard</a></li>
    </ul>
    <!-- END Dashboard Header -->

    <!-- Dashboard Content -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Search Block -->
            <div class="block full">
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Everything <span class="caret"></span></a>
                            <ul class="dropdown-menu pull-right">
                                <li class="active"><a href="javascript:void(0)"><i class="fa fa-check"></i> Everything</a></li>
                                <li class="divider"></li>
                                <li><a href="javascript:void(0)">Users</a></li>
                                <li><a href="javascript:void(0)">Projects</a></li>
                                <li><a href="javascript:void(0)">Sites</a></li>
                            </ul>
                        </div>
                    </div>
                    <h2><i class="fa fa-search"></i> Search</h2>
                </div>
                <form action="page_ready_search_results.php" method="post">
                    <div class="input-group">
                        <input type="text" id="search-term" name="search-term" class="form-control" placeholder="What?">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- END Search Block -->

            <!-- Recent Updates Block -->
            <div class="block full">
                <!-- Recent Updates Title -->
                <div class="block-title">
                    <h2><i class="fa fa-rss"></i> News</h2>
                </div>
                <!-- END Recent Updates Title -->

                <!-- Update Status Form -->
                <form action="index.php" method="post" class="profile-status block-top" onsubmit="return false;">
                    <textarea id="status-update" name="status-update" rows="3" class="form-control" placeholder="How are you? (Try posting something)"></textarea>
                    <div class="clearfix">
                        <button type="submit" id="status-update-btn" class="btn btn-primary pull-right"><i class="fa fa-angle-right"></i> Post</button>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Record Voice"><i class="fa fa-microphone"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Take Photo"><i class="fa fa-camera"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Upload File"><i class="fa fa-cloud-upload"></i></a>
                    </div>
                </form>
                <!-- END Update Status Form -->

                <!-- Updates -->
                <div class="timeline-con">
                    <ul class="timeline remove-margin">
                        <li class="alt-color">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">3 min ago</small><i class="fa fa-plus"></i> Friend Request</h4>
                                <div class="timeline-content">
                                    <p class="clearfix">
                                        <img src="<?php echo img_url('template/avatar.png'); ?>" alt="avatar" class="img-circle pull-right">
                                        <a href="page_special_user_profile.php">John</a> would like to become friends!
                                    </p>
                                    <a href="javascript:void(0)" class="btn btn-xs btn-success" id="accept-request"><i class="fa fa-check"></i> Accept</a>
                                </div>
                            </div>
                        </li>
                        <li class="text-right">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">20 min ago</small><i class="fa fa-file"></i> Status</h4>
                                <div class="timeline-content">Today is a good day!</div>
                            </div>
                        </li>
                        <li class="text-right">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">1 hour ago</small><i class="fa fa-cloud-upload"></i> Image Upload</h4>
                                <div class="timeline-content">
                                    <p>
                                        <a href="page_special_user_profile.php">Michael</a> just uploaded an image in <a href="javascript:void(0)" class="btn btn-xs btn-primary">Secret Project</a>
                                    </p>
                                    <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image">
                                        <img src="<?php echo img_url('placeholders/image_160x120_dark.png'); ?>" alt="image">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="alt-color">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">2 hours ago</small><i class="fa fa-cog"></i> System Update</h4>
                                <div class="timeline-content"><strong>Application</strong> updated to version 3.0! Check out the <a href="javascript:void(0)">documentation</a> to learn about the new features!</div>
                            </div>
                        </li>
                        <li class="text-right">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">3 hours ago</small><i class="fa fa-magic"></i> Special Offer</h4>
                                <div class="timeline-content"><a href="page_ready_pricing_tables.php">Upgrade your plan</a> and get 1 year for free!</div>
                            </div>
                        </li>
                        <li class="text-right">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">1 day ago</small><i class="fa fa-file"></i> Status</h4>
                                <div class="timeline-content">Just finished the project, check it out <a href="javascript:void(0)">live</a>!</div>
                            </div>
                        </li>
                        <li class="alt-color">
                            <div class="timeline-item">
                                <h4 class="timeline-title"><small class="timeline-meta">2 days ago</small><i class="fa fa-hdd-o"></i> Server Update</h4>
                                <div class="timeline-content"><strong>Server #1</strong> updated successfully!</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- END Updates -->
            </div>
            <!-- END Recent Updates Block -->
        </div>
        <div class="col-md-6">
            <!-- Quick Stats Block -->
            <div class="block">
                <!-- Quick Stats Title -->
                <div class="block-title">
                    <h2 class="text-center"><i class="fa fa-suitcase"></i> Business Plan <small>Active - <a href="page_ready_pricing_tables.php">Upgrade?</a></small></h2>
                </div>
                <!-- END Quick Stats Title -->

                <!-- Quick Stats Content -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="pie-chart block-section" data-percent="90" data-size="150">
                            <span>4.5<small>/5</small> <strong>GB</strong></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="pie-chart block-section" data-percent="60" data-size="150">
                            <span>12<small>/20</small> <strong>Sites</strong></span>
                        </div>
                    </div>
                </div>
                <!-- END Quick Stats Content -->
            </div>
            <!-- END Quick Stats Block -->

            <!-- Earning/Sales Stats Block -->
            <div class="block full">
                <div class="block-title">
                    <h2 class="text-center"><i class="glyphicon-charts"></i> Earnings / Sales <small>Last Week - <a href="page_comp_charts.php">In detail</a></small></h2>
                </div>
                <div id="chart-classic" class="chart"></div>
            </div>
            <!-- END Earning/Sales Stats Block -->

            <!-- Extra Block -->
            <div class="block">
                <!-- Extra Title -->
                <div class="block-title">
                    <h2><i class="fa fa-thumbs-o-up"></i> Recommended Web Designers</h2>
                </div>
                <!-- END Extra Title -->

                <!-- Extra Content -->
                <div class="content-text clearfix">
                    <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="avatar" class="img-circle img-responsive pull-left">
                    <h3 class="push"><a href="page_special_user_profile.php">John Doe</a> <small><em>750 Followers</em></small></h3>
                    <a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-share"></i> Follow</a>
                    <a href="javascript:void(0)" class="btn btn-xs btn-primary">Hire</a>
                </div>
                <!-- END Extra Content -->
            </div>
            <!-- END Extra Block -->
        </div>
    </div>
    <!-- END Dashboard Content -->
</div>
<!-- END Page Content -->

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        // Set up timeline scrolling functionality
        $('.timeline-con').slimScroll({ height: 565, color: '#000000', size: '3px', touchScrollStep: 100, distance: '0' });
        $('.timeline').css('min-height', '565px');

        // Demo status updates and timeline functionality
        var statusUpdate    = $('#status-update');
        var statusUpdateVal = '';

        $('#accept-request').click(function(){ $(this).replaceWith('<span class="label label-success">Awesome, you became friends!'); });

        $('#status-update-btn').click(function(){
            statusUpdateVal = statusUpdate.val();

            if ( statusUpdateVal ) {
                $('.timeline-con').slimScroll({scrollTo: '0px'});

                $('.timeline').prepend('<li class="animation-pullDown">' +
                        '<div class="timeline-item">' +
                        '<h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="fa fa-file"></i> Status</h4>' +
                        '<div class="timeline-content"><p>' + $('<div />').text(statusUpdateVal).html().substring(0, 200) + '</p><em>Demo functionality</em></div>' +
                        '</div>' +
                        '</li>');

                statusUpdate.val('').attr('placeholder', 'I hope you like it! :-)');
            }
        });

        /*
         * Flot 0.8.1 Jquery plugin is used for charts
         *
         * For more examples or getting extra plugins you can check http://www.flotcharts.org/
         * Plugins included in this template: pie, resize, stack
         */

        // Get the elements where we will attach the charts
        var chartClassic    = $('#chart-classic');

        // Random data for the charts
        var dataEarnings    = [[0, 60],[1, 100],[2, 80],[3, 84],[4, 124],[5, 90],[6, 150]];
        var dataSales       = [[0, 30],[1, 50],[2, 40],[3, 42],[4, 62],[5, 45],[6, 75]];

        /* Classic Chart */
        $.plot(chartClassic,
            [
                {
                    data: dataEarnings,
                    lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.25 }, { opacity: 0.25 }] } },
                    points: { show: true, radius: 7 }
                },
                {
                    data: dataSales,
                    lines: { show: true, fill: true, fillColor: { colors: [{ opacity: 0.15 }, { opacity: 0.15 }] } },
                    points: { show: true, radius: 7 }
                }
            ],
            {
                colors: ['#f39c12', '#2e3030'],
                legend: { show: false },
                grid: { borderWidth: 0, hoverable: true, clickable: true },
                yaxis: { show: false },
                xaxis: { show: false }
            }
        );

        // Creating and attaching a tooltip to the classic chart
        var previousPoint = null, ttlabel = null;
        chartClassic.bind('plothover', function (event, pos, item) {

            if (item) {
                if (previousPoint !== item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $('#chart-tooltip').remove();
                    var x = item.datapoint[0], y = item.datapoint[1];

                    if ( item.seriesIndex === 1 ) {
                        ttlabel = '<strong>' + y +'</strong> sales';
                    } else {
                        ttlabel = '$ <strong>' + y +'</strong>';
                    }

                    $('<div id="chart-tooltip" class="chart-tooltip">' + ttlabel + '</div>')
                        .css( { top: item.pageY - 45, left: item.pageX + 5 }).appendTo("body").show();
                }
            }
            else {
                $('#chart-tooltip').remove();
                previousPoint = null;
            }
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>