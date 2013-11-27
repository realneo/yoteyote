<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block full">
    <!-- Datatables Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-thumbs-o-up animation-expandUp"></i>Datatables<br><small>Any static table can become fully dynamic with cool features like pagination and instant search!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-th"></i></li>
        <li>Tables</li>
        <li><a href="">Datatables</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <p><a href="https://datatables.net/" target="_blank">DataTables</a> is a plug-in for the Jquery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table. It is integrated with template's style and it offers many features such as on-the-fly filtering and variable length pagination.</p>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-hover">
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
                <?php
                $labels['0']['class'] = "label-success";
                $labels['0']['text'] = "VIP";
                $labels['1']['class'] = "label-primary";
                $labels['1']['text'] = "Business";
                $labels['2']['class'] = "label-info";
                $labels['2']['text'] = "Personal";
                $labels['3']['class'] = "label-danger";
                $labels['3']['text'] = "Trial";
                ?>
                <?php for($i=1; $i<106; $i++) { ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><a href="javascript:void(0)">client<?php echo $i; ?></a></td>
                    <td>client<?php echo $i; ?>@company.com</td>
                    <?php $rand = rand(0, 3); ?>
                    <td><span class="label<?php echo ($labels[$rand]['class']) ? " " . $labels[$rand]['class'] : ""; ?>"><?php echo $labels[$rand]['text'] ?></span></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-default"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END Datatables Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Initialize Bootstrap Datatables Integration */
        webApp.datatables();

        /* Initialize Datatables */
        $('#example-datatable').dataTable({
            "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 4 ] } ],
            "iDisplayLength": 15,
            "aLengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]]
        });

        /* Add classes to select and input */
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
        $('.dataTables_length select').addClass('form-control');
    });
</script>

<?php $this->load->view('partials/bottom'); ?>