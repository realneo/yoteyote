<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block full">
    <!-- 404 Error Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-times-circle-o animation-expandUp"></i>404 Error<br><small>Errors may happen but we are prepared!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">404 Error</a></li>
    </ul>
    <!-- END 404 Error Header -->

    <!-- Error Content -->
    <div class="row gutter30 error-container animation-expandUp">
        <div class="col-xs-6 text-right">
            <i class="fa fa-times text-danger"></i>
        </div>
        <div class="col-xs-6 text-left">
            <h1>404</h1>
            <small>Page not found.. :-(</small>
        </div>
    </div>
    <form action="page_ready_search_results.php" method="post">
        <div class="input-group input-group-lg">
            <div class="input-group-btn">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Everything <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-check"></i> Everything</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)">Users</a></li>
                    <li><a href="javascript:void(0)">Projects</a></li>
                    <li><a href="javascript:void(0)">Sites</a></li>
                </ul>
            </div>
            <input type="text" id="search-term" name="search-term" class="form-control" placeholder="But cheer up! Search..">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
            </span>
        </div>
    </form>
    <!-- END Error Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>