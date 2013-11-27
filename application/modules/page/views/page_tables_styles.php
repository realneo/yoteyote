<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Table Styles Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-tint animation-expandUp"></i>Table Styles<br><small>Professional looking tables with many style options!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-th"></i></li>
        <li>Tables</li>
        <li><a href="">Styles</a></li>
    </ul>
    <!-- END Table Styles Header -->

    <!-- Styles Block -->
    <div class="block">
        <!-- Styles Title -->
        <div class="block-title">
            <h2>Styles</h2>
        </div>
        <!-- END Styles Title -->

        <!-- Styles Content -->
        <p>Just add the class <code>.table</code> and you will get a great styled table! If you would like to make it responsive just wrap it inside an element with the class <code>.table-responsive</code>! Also, you can have various style alterations just by adding some extra classes (<code>.table-bordered</code> <code>.table-borderless</code> <code>.table-striped</code> <code>.table-condensed</code> <code>.table-hover</code>). You can check the various styles offered by clicking the following buttons.</p>

        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right push">
                <a href="javascript:void(0)" class="btn btn-primary" id="style-striped">Striped</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="style-condensed">Condensed</a>
                <a href="javascript:void(0)" class="btn btn-primary" id="style-hover">Hover</a>
            </div>
            <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                <label id="style-default" class="btn btn-primary active">
                    <input type="radio" name="style-options"> Default
                </label>
                <label id="style-bordered" class="btn btn-primary">
                    <input type="radio" name="style-options"> Bordered
                </label>
                <label id="style-borderless" class="btn btn-primary">
                    <input type="radio" name="style-options"> Borderless
                </label>
            </div>
        </div>
        <div class="table-responsive">
            <table id="general-table" class="table">
                <thead>
                    <tr>
                        <th class="text-center"><input type="checkbox"></th>
                        <th class="text-center">#</th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Subscription</th>
                        <th>Expires</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-1" name="checkbox1-1"></td>
                        <td class="text-center">1</td>
                        <td><a href="javascript:void(0)">client1</a></td>
                        <td>client1@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td><a href="javascript:void(0)" class="label label-success">Lifetime</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" class="btn btn-default disabled"><i class="fa fa-minus"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-2" name="checkbox1-2"></td>
                        <td class="text-center">2</td>
                        <td><a href="javascript:void(0)">client2</a></td>
                        <td>client2@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-danger">Trial</a></td>
                        <td><a href="javascript:void(0)" class="label label-danger">in 1 month</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-3" name="checkbox1-3"></td>
                        <td class="text-center">3</td>
                        <td><a href="javascript:void(0)">client3</a></td>
                        <td>client3@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td><a href="javascript:void(0)" class="label label-warning">in 1 year</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-4" name="checkbox1-4"></td>
                        <td class="text-center">4</td>
                        <td><a href="javascript:void(0)">client4</a></td>
                        <td>client4@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td><a href="javascript:void(0)" class="label label-success">Lifetime</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-5" name="checkbox1-5"></td>
                        <td class="text-center">5</td>
                        <td><a href="javascript:void(0)">client5</a></td>
                        <td>client5@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td><a href="javascript:void(0)" class="label label-warning">in 1 year</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-6" name="checkbox1-6"></td>
                        <td class="text-center">6</td>
                        <td><a href="javascript:void(0)">client6</a></td>
                        <td>client6@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td><a href="javascript:void(0)" class="label label-warning">in 6 months</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" class="btn btn-default disabled"><i class="fa fa-minus"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-7" name="checkbox1-7"></td>
                        <td class="text-center">7</td>
                        <td><a href="javascript:void(0)">client7</a></td>
                        <td>client7@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-danger">Trial</a></td>
                        <td><a href="javascript:void(0)" class="label label-danger">in 3 days</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-8" name="checkbox1-8"></td>
                        <td class="text-center">8</td>
                        <td><a href="javascript:void(0)">client8</a></td>
                        <td>client8@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td><a href="javascript:void(0)" class="label label-warning">in 3 months</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-9" name="checkbox1-9"></td>
                        <td class="text-center">9</td>
                        <td><a href="javascript:void(0)">client9</a></td>
                        <td>client9@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td><a href="javascript:void(0)" class="label label-danger">in 2 weeks</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center"><input type="checkbox" id="checkbox1-10" name="checkbox1-10"></td>
                        <td class="text-center">10</td>
                        <td><a href="javascript:void(0)">client10</a></td>
                        <td>client10@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td><a href="javascript:void(0)" class="label label-warning">in 3 months</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Upgrade Subscription" class="btn btn-default"><i class="fa fa-arrow-up"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Info" class="btn btn-default"><i class="fa fa-info-circle"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7">
                            <div class="btn-group btn-group-sm pull-right">
                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                <div class="btn-group btn-group-sm dropup">
                                    <a href="javascript:void(0)" class="btn btn-default pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
                                        <li class="divider"></li>
                                        <li class="dropdown-header"><i class="fa fa-share"></i> Export As</li>
                                        <li><a href="javascript:void(0)">.pdf</a></li>
                                        <li><a href="javascript:void(0)">.cvs</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit Selected"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete Selected"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- END Styles Content -->
    </div>
    <!-- END Styles Block -->

    <!-- Row and Cell Styles Block -->
    <div class="block">
        <!-- Row and Cell Styles Title -->
        <div class="block-title">
            <h2>Row and Cell Styles</h2>
        </div>
        <!-- END Row and Cell Styles Title -->

        <!-- Row and Cell Styles Content -->
        <p>You can use the classes <code>.active</code> <code>.success</code> <code>.warning</code> or <code>.danger</code> for styling individual table rows or cells.</p>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Client</th>
                        <th>Email</th>
                        <th>Subscription</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active">
                        <td class="text-center">1</td>
                        <td><a href="javascript:void(0)">client1</a></td>
                        <td>client1@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td><a href="javascript:void(0)">client2</a></td>
                        <td>client2@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-danger">Trial</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="success">
                        <td class="text-center">3</td>
                        <td><a href="javascript:void(0)">client3</a></td>
                        <td>client3@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td><a href="javascript:void(0)">client4</a></td>
                        <td>client4@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="warning">
                        <td class="text-center">5</td>
                        <td><a href="javascript:void(0)">client5</a></td>
                        <td>client5@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">6</td>
                        <td><a href="javascript:void(0)">client6</a></td>
                        <td>client6@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-success">VIP</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr class="danger">
                        <td class="text-center">7</td>
                        <td><a href="javascript:void(0)">client7</a></td>
                        <td>client7@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-danger">Trial</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">8</td>
                        <td><a href="javascript:void(0)">client8</a></td>
                        <td>client8@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-info">Personal</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="active text-center">9</td>
                        <td class="warning"><a href="javascript:void(0)">client9</a></td>
                        <td class="success">client9@company.com</td>
                        <td class="danger"><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td class="warning text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center">10</td>
                        <td><a href="javascript:void(0)">client10</a></td>
                        <td>client10@company.com</td>
                        <td><a href="javascript:void(0)" class="label label-primary">Business</a></td>
                        <td class="text-center">
                            <div class="btn-group btn-group-xs">
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Row and Cell Styles Content -->
    </div>
    <!-- END Row and Cell Styles Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Select/Deselect all checkboxes in tables */
        $('thead input:checkbox').click(function() {
            var checkedStatus   = $(this).prop('checked');
            var table           = $(this).closest('table');

            $('tbody input:checkbox', table).each(function() {
                $(this).prop('checked', checkedStatus);
            });
        });

        /* Table Styles Switcher */
        var genTable = $('#general-table');

        $('#style-default').click(function(){ genTable.removeClass('table-bordered').removeClass('table-borderless'); });
        $('#style-bordered').click(function(){ genTable.removeClass('table-borderless').addClass('table-bordered'); });
        $('#style-borderless').click(function(){ genTable.removeClass('table-bordered').addClass('table-borderless'); });

        $('#style-striped').on('click', function() {
            $(this).toggleClass('active');

            if ($(this).hasClass('active')) {
                genTable.addClass('table-striped');
            } else {
                genTable.removeClass('table-striped');
            }
        });

        $('#style-condensed').on('click', function() {
            $(this).toggleClass('active');

            if ($(this).hasClass('active')) {
                genTable.addClass('table-condensed');
            } else {
                genTable.removeClass('table-condensed');
            }
        });

        $('#style-hover').on('click', function() {
            $(this).toggleClass('active');

            if ($(this).hasClass('active')) {
                genTable.addClass('table-hover');
            } else {
                genTable.removeClass('table-hover');
            }
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>