<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block full">
    <!-- Calendar Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-calendar animation-expandUp"></i>Calendar<br><small>FullCalendar integration featuring a clean look!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Calendar</a></li>
    </ul>
    <!-- END Calendar Header -->

    <!-- FullCalendar Content -->
    <p>
		The popular <a href="http://arshaw.com/fullcalendar/" target="_blank">FullCalendar</a>
		plugin is integrated in this template. You could use it for displaying your app's events or those from a public Google Calendar!
	</p>

    <div id="example-fullcalendar"></div>
    <!-- END FullCalendar Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function() {
        /* Initialize FullCalendar */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#example-fullcalendar').fullCalendar({
            header: {
                left: 'month,agendaWeek,agendaDay',
                center: 'title',
                right: 'prev,today,next'
            },
            firstDay: 1,
            editable: true,
            events: [
                {
                    title: 'Gaming Day',
                    start: new Date(y, m, 1),
                    color: '#2e3030'
                },
                {
                    title: 'Live Conference',
                    start: new Date(y, m, 3)
                },
                {
                    title: 'Top Secret Project',
                    start: new Date(y, m, 4),
                    end: new Date(y, m, 8),
                    color: '#2e3030'
                },
                {
                    id: 999,
                    title: 'Gym (repeated)',
                    start: new Date(y, m, d - 3, 15, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Gym (repeated)',
                    start: new Date(y, m, d + 3, 15, 0),
                    allDay: false
                },
                {
                    title: 'Job Meeting',
                    start: new Date(y, m, d, 16, 00),
                    allDay: false,
                    color: '#2e3030'
                },
                {
                    title: 'Awesome Project',
                    start: new Date(y, m, d, 9, 0),
                    end: new Date(y, m, d, 12, 0),
                    allDay: false
                },
                {
                    title: 'Party',
                    start: new Date(y, m, d + 7, 21, 0),
                    end: new Date(y, m, d + 7, 23, 30),
                    allDay: false
                },
                {
                    title: 'Follow me on Twitter',
                    start: new Date(y, m, 24),
                    end: new Date(y, m, 26),
                    url: 'http://twitter.com/pixelcave',
                    color: '#2e3030'
                }
            ]
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>