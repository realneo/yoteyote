<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Charts Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-charts animation-expandUp"></i>Charts<br><small>Beautiful and vibrant charts for your statistics!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Charts</a></li>
    </ul>
    <!-- END Charts Header -->

    <!-- Easy Pie Charts Block -->
    <div class="block">
        <!-- Easy Pie Charts Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary toggle-pies">Randomize</a>
            </div>
            <h2>Easy Pie Charts</h2>
        </div>
        <!-- END Easy Pie Charts Title -->

        <!-- Easy Pie Charts Content -->
        <div class="row text-center">
            <div class="col-sm-3">
                <!-- Just add the class .pie-chart as well as the values you would like at data-percent and data-size (in px), it is initialized in main.js -->
                <div class="pie-chart block-section" data-percent="25" data-size="150">
                    <span>25%</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pie-chart block-section" data-percent="50" data-size="150">
                    <span>50%</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pie-chart block-section" data-percent="75" data-size="150">
                    <span>75%</span>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="pie-chart block-section" data-percent="100" data-size="150">
                    <span>100%</span>
                </div>
            </div>
        </div>
        <!-- END Easy Pie Charts Content -->
    </div>
    <!-- END Easy Pie Charts Block -->

    <!-- Flot Charts Content -->
    <div class="row gutter30">
        <div class="col-sm-6">
            <!-- Classic Chart Block -->
            <div class="block full">
                <!-- Classic Chart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-warning">Earnings</span>
                        <span class="label label-default">Sales</span>
                    </div>
                    <h2>Classic Chart</h2>
                </div>
                <!-- END Classic Chart Title -->

                <!-- Classic Chart Content -->
                <div id="chart-classic" class="chart"></div>
                <!-- END Classic Chart Content -->
            </div>
            <!-- END Classic Chart Block -->
        </div>
        <div class="col-sm-6">
            <!-- Stacked Chart Block -->
            <div class="block full">
                <!-- Stacked Chart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-warning">Earnings</span>
                        <span class="label label-default">Sales</span>
                    </div>
                    <h2>Stacked Chart</h2>
                </div>
                <!-- END Stacked Chart Title -->

                <!-- Stacked Chart Content -->
                <div id="chart-stacked" class="chart"></div>
                <!-- END Stacked Chart Content -->
            </div>
            <!-- END Stacked Chart Block -->
        </div>
    </div>

    <!-- Live Chart Block -->
    <div class="block full">
        <!-- Bars Chart Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <span id="chart-live-info" class="label label-default">%</span>
            </div>
            <h2>Live Chart</h2>
        </div>
        <!-- END Bars Chart Title -->

        <!-- Bars Chart Content -->
        <div id="chart-live" class="chart"></div>
        <!-- END Bars Chart Content -->
    </div>
    <!-- END Live Chart Block -->

    <div class="row gutter30">
        <div class="col-sm-6">
            <!-- Bars Chart Block -->
            <div class="block full">
                <!-- Bars Chart Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <span class="label label-warning">Sales</span>
                    </div>
                    <h2>Bars Chart</h2>
                </div>
                <!-- END Bars Chart Title -->

                <!-- Bars Chart Content -->
                <div id="chart-bars" class="chart"></div>
                <!-- END Bars Chart Content -->
            </div>
            <!-- END Bars Chart Block -->
        </div>
        <div class="col-sm-6">
            <!-- Pie Chart Block -->
            <div class="block full">
                <!-- Pie Chart Title -->
                <div class="block-title">
                    <h2>Pie Chart</h2>
                </div>
                <!-- END Pie Title -->

                <!-- Pie Chart Content -->
                <div id="chart-pie" class="chart"></div>
                <!-- END Pie Chart Content -->
            </div>
            <!-- END Pie Chart Block -->
        </div>
    </div>
    <!-- END Flot Charts Content -->
</div>
<!-- END Page Content -->

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Randomize easy pie charts values */
        var random;

        $('.toggle-pies').click(function(){
            $('.pie-chart').each(function(){
                random = getRandomInt(1, 100);
                $(this).data('easyPieChart').update(random);
                $(this).find('span').text(random + '%');
            });
        });

        // Get random number function from a given range
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        /*
         * Flot 0.8.1 Jquery plugin is used for charts
         *
         * For more examples or getting extra plugins you can check http://www.flotcharts.org/
         * Plugins included in this template: pie, resize, stack
         */

        // Get the elements where we will attach the charts
        var chartClassic    = $('#chart-classic');
        var chartStacked    = $('#chart-stacked');
        var chartLive       = $('#chart-live');
        var chartBars       = $('#chart-bars');
        var chartPie        = $('#chart-pie');

        // Random data for the charts
        var dataEarnings    = [[0, 28],[1, 70],[2, 80],[3, 84],[4, 124],[5, 90],[6, 150],[7, 138],[8, 162],[9, 176]];
        var dataSales       = [[0, 14],[1, 35],[2, 40],[3, 42],[4, 62],[5, 45],[6, 75],[7, 69],[8, 81],[9, 88]];
        var dataSales2      = [[1, 25], [3, 50], [5, 28], [7, 61], [9, 47], [11, 38], [13, 69], [15, 34], [17, 63], [19, 49], [21, 52]];

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

        /* Stacked Chart */
        $.plot(chartStacked,
            [ { data: dataSales }, { data: dataEarnings } ],
            {
                colors: ['#2e3030', '#f39c12'],
                series: { stack: true, lines: { show: true, fill: true } },
                lines: { show: true, lineWidth: 1.5, fill: true, fillColor: { colors: [{ opacity: 1 }, { opacity: 1 }] } },
                legend: { show: false },
                grid: { borderWidth: 0 },
                yaxis: { show: false },
                xaxis: { show: false }
            }
        );

        /* Live Chart */
        var dataLive = [];

        // Random data generator
        function getRandomData() {

            if (dataLive.length > 0)
                dataLive = dataLive.slice(1);

            while (dataLive.length < 300) {
                var prev = dataLive.length > 0 ? dataLive[dataLive.length - 1] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                dataLive.push(y);
            }

            var res = [];
            for (var i = 0; i < dataLive.length; ++i)
                res.push([i, dataLive[i]]);

            // Show live chart info
            $('#chart-live-info').html(y.toFixed(0) + '%');

            return res;
        }

        // Update live chart
        function updateChartLive() {
            chartLive.setData([ getRandomData() ]);
            chartLive.draw();
            setTimeout(updateChartLive, 150);
        }

        // Initialize live chart
        var chartLive = $.plot(chartLive,
            [ { data: getRandomData() } ],
            {
                series: { shadowSize: 0 },
                lines: { show: true, lineWidth: 1, fill: true, fillColor: { colors: [{ opacity: 0.05 }, { opacity: 0.05  }] } },
                colors: ['#777777'],
                grid: { borderWidth: 0 },
                yaxis: { show: true, min: 0, max: 110 },
                xaxis: { show: false }
            }
        );

        // Start getting new data
        updateChartLive();

        /* Bars Chart */
        $.plot(chartBars,
            [
                {
                    data: dataSales2,
                    bars: { show: true, fillColor: { colors: [{ opacity: 1 }, { opacity: 1 }] } }
                }
            ],
            {
                colors: ['#f39c12'],
                legend: { show: false },
                grid: { borderWidth: 0 },
                yaxis: { ticks: 7, tickColor: '#eeeeee' },
                xaxis: { ticks: 10, tickColor: '#ffffff' }
            }
        );

        /* Pie Chart */
        $.plot(chartPie,
            [
                { label: 'Sales', data: 36 },
                { label: 'Earnings', data: 40 },
                { label: 'Support Emails', data: 24 }
            ],
            {
                colors: ['#2e3030', '#f39c12', '#999999'],
                legend: { show: false },
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        label: {
                            show: true,
                            radius: 3/4,
                            formatter: function(label, pieSeries){
                                return '<div class="chart-pie-label">' + label + '<br>' + Math.round(pieSeries.percent) + '%</div>';
                            },
                            background: { opacity: 0.75, color: '#000000' }
                        }
                    }
                }
            }
        );
    });
</script>

<?php $this->load->view('partials/bottom'); ?>