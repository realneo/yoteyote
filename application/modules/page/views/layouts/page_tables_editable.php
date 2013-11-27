<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block full">
    <!-- Editable Tables Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-pencil animation-expandUp"></i>Editable Tables<br><small>Custom JS code for making a Datatable editable!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-th"></i></li>
        <li>Tables</li>
        <li><a href="">Editable</a></li>
    </ul>
    <!-- END Editable Tables Header -->

    <!-- Editable Tables Content -->
    <p>The template comes with custom Javascript code that can make a Datatable editable. It enables you to delete a row, add a new row or edit the content of an individual cell. You just set up the structure of the table and the connection with your backend! Feel free to try the functionality at the following example.</p>

    <!-- Table Options -->
    <div class="table-options clearfix">
        <div class="btn-group btn-group-sm pull-right">
            <a href="javascript:void(0)" class="btn btn-primary">Example</a>
            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
            <div class="btn-group btn-group-sm">
                <a href="javascript:void(0)" class="btn btn-primary pull-right dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0)"><i class="fa fa-print"></i> Print</a></li>
                    <li class="divider"></li>
                    <li class="dropdown-header"><i class="fa fa-share"></i> Export As</li>
                    <li><a href="javascript:void(0)">.pdf</a></li>
                    <li><a href="javascript:void(0)">.cvs</a></li>
                </ul>
            </div>
        </div>
        <button id="addRow" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Add Row</button>
    </div>
    <!-- END Table Options -->

    <!-- Table -->
    <div class="table-responsive">
        <table id="example-editable-datatables" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Client</th>
                    <th>Email</th>
                    <th>Registered</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <!-- Add ids to tr and td, so that you can use them to handle the data in your backend -->
                <!-- Make sure to add the .editable-td class to the inputs you would like to be editable! -->
                <!-- Also make sure to set up the cells you add here in the addHandle() function accordingly -->
                <?php for($i=1; $i<31; $i++) { ?>
                <tr id="<?php echo $i; ?>">
                    <td id="id<?php echo $i; ?>" class="text-center"><?php echo $i; ?></td>
                    <td id="client<?php echo $i; ?>" class="editable-td">company-client<?php echo $i; ?></td>
                    <td id="email<?php echo $i; ?>" class="editable-td">client<?php echo $i; ?>@company.com</td>
                    <td id="year<?php echo $i; ?>" class="editable-td"><?php echo rand(2005, 2013); ?></td>
                    <td class="text-center">
                        <a href="javascript:void(0)" id="delRow<?php echo $i; ?>" class="btn btn-xs btn-danger delRow"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- END Table -->
    <!-- END Editable Tables Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Initialize Bootstrap Datatables Integration */
        webApp.datatables();

        // Hold our table to a variable
        var exampleDatatable = $('#example-editable-datatables');

        /*
         * Function for handing the data after a cell has been edited
         *
         * From here you can send the data with ajax (for example) to handle in your backend
         *
         */
        var reqHandle = function(value, settings){

            // this, the edited td element
            console.log(this);

            // $(this).attr('id'), get the id of the edited td
            console.log($(this).attr('id'));

            // $(this).parent('tr').attr('id'), get the id of the row
            console.log($(this).parent('tr').attr('id'));

            // value, the new value the user submitted
            console.log(value);

            // settings, the settings of jEditable
            console.log(settings);

            // Here you can send and handle the data in your backend
            // ...

            // For this example, just return the data the user submitted
            return(value);
        };

        /*
         * Function for initializing jEditable handlers to the table
         *
         * For advance usage you can check http://www.appelsiini.net/projects/jeditable
         *
         */
        var initEditable = function(rowID){

            // Hold the elements that the jEditable with be initialized
            var elements;

            // If we don't have a rowID apply to all td elements with .editable-td class
            if (!rowID)
                elements = $('td.editable-td', editableTable.fnGetNodes());
            else
                elements = $('td.editable-td', editableTable.fnGetNodes(rowID));

            elements.editable(reqHandle, {
                "callback": function( sValue, y ) {
                    // Update the table cell after the edit has been processed
                    var aPos = editableTable.fnGetPosition(this);
                    editableTable.fnUpdate(sValue, aPos[0], aPos[1]);

                    // Little fix for responsive table after edit
                    exampleDatatable.css('width', '100%');
                },
                "submitdata": function ( value, settings ) {
                    // Sent some extra data
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": editableTable.fnGetPosition(this)[2]
                    };
                },
                indicator : '<i class="fa fa-spinner fa-spin"></i>',
                cssclass : 'editable-form',
                submit: 'Ok',
                cancel: 'Cancel'
            });
        };

        /*
         * Function for deleting table row
         *
         */
        var delHandle = function(){

            // When the user clicks on a delete button
            $('body').on('click','a.delRow', function(){
                var aPos = editableTable.fnGetPosition(this.parentNode);
                var aData = editableTable.fnGetData(aPos[0]);
                var rowID = $(this).parents('tr').attr('id');

                // Here you can handle the deletion of the row in your backend
                // ...

                // Delete row if success with the backend
                editableTable.fnDeleteRow(aPos[0]);
            });
        };

        /*
         * Function for adding table row
         *
         */
        var addHandle = function(){

            // When the user clicks on the 'Add New User' button
            $("#addRow").click(function(){

                // Here you can handle your backend data (eg: adding a row to database and return the id of the row)

                // ..

                // Create a new row and set it up
                var rowID = editableTable.fnAddData(['', '', '', '', '']);

                // Example id, here you should add the one you created in your backend
                var id = rowID[0] + 1;

                // Update the id cell, so that our table redraw and resort (new row goes first in datatable)
                editableTable.fnUpdate(id, rowID[0], 0);

                // Get the new row
                var nRow = editableTable.fnGetNodes(rowID[0]);

                /*
                 * In the following section you should set up your cells
                 */
                // Add id to tr element
                $(nRow).attr('id', id);

                // Setup first cell (id)
                $(nRow)
                    .children('td:nth-child(1)')
                    .attr('id', 'id' + id)
                    .addClass('text-center');

                // Setup second cell (Client)
                $(nRow).children('td:nth-child(2)').addClass('editable-td').attr('id', 'client' + id);

                // Setup third cell (Email)
                $(nRow).children('td:nth-child(3)').addClass('editable-td').attr('id', 'email' + id);

                // Setup fourth cell (Registered)
                $(nRow).children('td:nth-child(4)').addClass('editable-td').attr('id', 'year' + id);

                // Setup fifth cell (delete button)
                $(nRow).children('td:nth-child(5)').addClass('text-center').html('<a href="javascript:void(0)" id="delRow' + id + '" class="btn btn-xs btn-danger delRow"><i class="fa fa-times"></i></a>');

                // Setup your other cells the same way (if you have more)
                // ...

                // Initialize jEditable to the new row
                initEditable(rowID[0]);

                // Little fix for responsive table after adding a new row
                exampleDatatable.css('width', '100%');
            });
        };

        // Initialize Datatables
        var editableTable = exampleDatatable.dataTable({
            "aaSorting": [[ 0, 'desc' ]],
            "aoColumnDefs": [{
                "bSortable": false,
                "aTargets": [4]
            }],
            "iDisplayLength": 15,
            "aLengthMenu": [[15, 30, 50, -1], [15, 30, 50, "All"]]
        });

        // Add classes to select and input
        $('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');
        $('.dataTables_length select').addClass('form-control');

        // Initialize jEditable
	initEditable();

        // Handle rows deletion
        delHandle();

        // Handle new rows
        addHandle();
    });
</script>

<?php $this->load->view('bottom'); ?>