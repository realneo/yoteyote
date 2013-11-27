<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Progress - Loading Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-gear fa-spin"></i>Progress - Loading<br><small>If it takes time, there's something to show!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-rocket"></i></li>
        <li>Elements</li>
        <li><a href="">Progress - Loading</a></li>
    </ul>
    <!-- END Progress - Loading Header -->

    <!-- Progress Bars Block -->
    <div class="block">
        <!-- Progress Bars Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary toggle-bars">Randomize</a>
            </div>
            <h2>Progress Bars</h2>
        </div>
        <!-- END Progress Bars Title -->

        <!-- Progress Bars Content -->
        <!-- Normal and Stacked -->
        <div class="row gutter30">
            <div class="col-md-6 bars-container">
                <h4>Normal</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">60%</div>
                </div>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">80%</div>
                </div>
            </div>
            <div class="col-md-6 bars-container">
                <h4>Striped</h4>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">60%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">80%</div>
                </div>
            </div>
        </div>
        <!-- END Normal and Stacked -->

        <!-- Striped and Animated -->
        <div class="row gutter30">
            <div class="col-md-6 bars-stacked-container">
                <h4>Stacked</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
                <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 10%">10%</div>
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 30%">30%</div>
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
            </div>
            <div class="col-md-6 bars-container">
                <h4>Striped Animated (on modern browsers)</h4>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">20%</div>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">40%</div>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">60%</div>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">80%</div>
                </div>
            </div>
        </div>
        <!-- END Striped and Animated -->
        <!-- END Progress Bars Content -->
    </div>
    <!-- END Progress Bars Block -->

    <!-- FontAwesome Block -->
    <div class="block">
        <!-- FontAwesome Title -->
        <div class="block-title">
            <h2>Font Awesome Loaders</h2>
        </div>
        <!-- END FontAwesome Title -->

        <!-- FontAwesome Content -->
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless remove-margin">
                    <tbody>
                        <tr>
                            <td><code>.fa</code> <code>.fa-spinner</code> <code>.fa-spin</code></td>
                            <td class="text-center"><i class="fa fa-spinner fa-spin"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-spinner</code> <code>.fa-spin</code> <code>.fa-2x</code></td>
                            <td class="text-center"><i class="fa fa-spinner fa-2x fa-spin"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-spinner</code> <code>.fa-spin</code> <code>.fa-3x</code></td>
                            <td class="text-center"><i class="fa fa-spinner fa-3x fa-spin"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-spinner</code> <code>.fa-spin</code> <code>.fa-4x</code></td>
                            <td class="text-center"><i class="fa fa-spinner fa-4x fa-spin"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-spinner</code> <code>.fa-spin-fast</code> <code>.fa-5x</code></td>
                            <td class="text-center"><i class="fa fa-spinner fa-spin-fast fa-5x"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><code>.fa</code> <code>.fa-asterisk</code> <code>.fa-spin</code></td>
                            <td class="text-center"><i class="fa fa-asterisk fa-spin text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-asterisk</code> <code>.fa-spin</code> <code>.fa-2x</code></td>
                            <td class="text-center"><i class="fa fa-asterisk fa-spin fa-2x text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-asterisk</code> <code>.fa-spin</code> <code>.fa-3x</code></td>
                            <td class="text-center"><i class="fa fa-asterisk fa-spin fa-3x text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-asterisk</code> <code>.fa-spin</code> <code>.fa-4x</code></td>
                            <td class="text-center"><i class="fa fa-asterisk fa-spin fa-4x text-danger"></i></td>
                        </tr>
                        <tr>
                            <td><code>.fa</code> <code>.fa-asterisk</code> <code>.fa-spin-fast</code> <code>.fa-5x</code></td>
                            <td class="text-center"><i class="fa fa-asterisk fa-spin-fast fa-5x text-danger"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END FontAwesome Content -->
    </div>
    <!-- END FontAwesome Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Randomize progress bars width */
        var random = 0;

        $('.toggle-bars').click(function(){
           $('.progress-bar', '.bars-container').each(function(){
               random = getRandomInt(10, 100) + '%';
               $(this).css('width', random).html(random);
           });

           $('.progress-bar', '.bars-stacked-container').each(function(){
               random = getRandomInt(10, 25) + '%';
               $(this).css('width', random).html(random);
           });
        });

        // Get random number function from a given range
        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    });
</script>

<?php $this->load->view('partials/bottom'); ?>