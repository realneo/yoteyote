<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Invoice Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-dollar animation-expandUp"></i>Invoice<br><small>Get paid in time!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Invoice</a></li>
    </ul>
    <!-- END Invoice Header -->

    <!-- Invoice Block -->
    <div class="block full">
        <!-- Invoice Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <div class="btn-group">
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Save"><i class="fa fa-floppy-o"></i></a>
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <h2><i class="fa fa-file-text-o"></i> #INV001528</h2>
        </div>
        <!-- END Invoice Title -->

        <!-- Invoice Content -->
        <!-- 2 Column grid -->
        <div class="row gutter30 block-section">
            <!-- Company Info -->
            <div class="col-sm-6">
                <h3 class="sub-header"><i class="fa fa-suitcase"></i> Company Inc.</h3>
                <address>
                    <strong>Name</strong><br>
                    Address<br>
                    Town/City<br>
                    Region, Zip/Postal Code<br><br>
                    <i class="fa fa-phone"></i> (000) 000-0000<br>
                    <i class="fa fa-envelope"></i> <a href="javascript:void(0)">example@example.com</a>
                </address>
            </div>
            <!-- END Company Info -->

            <!-- Client Info -->
            <div class="col-sm-6">
                <h3 class="sub-header text-right">Client <i class="fa fa-user"></i></h3>
                <address class="text-right">
                    <strong><i class="fa fa-suitcase"></i> Name</strong><br>
                    Address<br>
                    Town/City<br>
                    Region, Zip/Postal Code<br><br>
                    (000) 000-0000 <i class="fa fa-phone"></i><br>
                    <a href="javascript:void(0)">example@example.com</a> <i class="fa fa-envelope"></i>
                </address>
            </div>
            <!-- END Client Info -->
        </div>
        <!-- END 2 Column grid -->

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th></th>
                        <th style="width: 70%;">Product</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Unit Price</th>
                        <th class="text-right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">1</td>
                        <td>
                            <h4>Logo Design</h4>
                            <span class="label label-info"><i class="fa fa-clock-o"></i> 2 weeks</span>
                            <span class="label label-success"><i class="fa fa-angle-right"></i> Revisions Available</span>
                        </td>
                        <td class="text-center"><span class="badge">1</span></td>
                        <td class="text-center"><span class="label label-default">$ 1000</span></td>
                        <td class="text-right"><span class="label label-primary">$ 1000</span></td>
                    </tr>
                    <tr>
                        <td class="text-center">2</td>
                        <td>
                            <h4>Website Design</h4>
                            <span class="label label-info"><i class="fa fa-clock-o"></i> 3 weeks</span>
                            <span class="label label-success"><i class="fa fa-angle-right"></i> Revisions Available</span>
                        </td>
                        <td class="text-center"><span class="badge">1</span></td>
                        <td class="text-center"><span class="label label-default">$ 1000</span></td>
                        <td class="text-right"><span class="label label-primary">$ 1000</span></td>
                    </tr>
                    <tr>
                        <td class="text-center">3</td>
                        <td>
                            <h4>Application Design</h4>
                            <span class="label label-info"><i class="fa fa-clock-o"></i> 2 weeks</span>
                            <span class="label label-success"><i class="fa fa-angle-right"></i> Android</span>
                        </td>
                        <td class="text-center"><span class="badge">1</span></td>
                        <td class="text-center"><span class="label label-default">$ 1000</span></td>
                        <td class="text-right"><span class="label label-primary">$ 1000</span></td>
                    </tr>
                    <tr>
                        <td class="text-center">4</td>
                        <td>
                            <h4>Application Marketing</h4>
                            <span class="label label-info"><i class="fa fa-clock-o"></i> 2 months</span>
                            <span class="label label-success"><i class="fa fa-angle-right"></i> Social + Ads</span>
                        </td>
                        <td class="text-center"><span class="badge">1</span></td>
                        <td class="text-center"><span class="label label-default">$ 1000</span></td>
                        <td class="text-right"><span class="label label-primary">$ 1000</span></td>
                    </tr>
                    <tr class="active">
                        <td colspan="4" class="text-right">SUBTOTAL</td>
                        <td class="text-right">$ 4000</td>
                    </tr>
                    <tr class="active">
                        <td colspan="4" class="text-right">VAT RATE</td>
                        <td class="text-right">20%</td>
                    </tr>
                    <tr class="active">
                        <td colspan="4" class="text-right">VAT DUE</td>
                        <td class="text-right">$ 800</td>
                    </tr>
                    <tr class="success">
                        <td colspan="4" class="text-right"><strong>TOTAL DUE</strong></td>
                        <td class="text-right"><span class="label label-success">$ 4800</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- END Table -->

        <div class="clearfix">
            <a href="javascript:void(0)" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Send Invoice</a>
        </div>
        <!-- END Invoice Content -->
    </div>
    <!-- END Invoice Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>