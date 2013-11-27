<!--
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel='stylesheet' type='text/css' href='css/bootstrap.min.css' />
        <link rel='stylesheet' type='text/css' href='css/bootstrap-theme.css' />
        <link rel='stylesheet' type='text/css' href='css/main.css' />
        <script type='text/javascript' src='js/jquery-1.10.2.min.js'></script>
        <script type='text/javascript' src='js/bootstrap.min.js'></script>
        <script type='text/javascript' src='js/main.js'></script>
    </head>
    <body>

        <button class="btn btn-danger" data-toggle="modal" data-target="#want_form">I Want </button>
-->

        <!-- Modal -->
        <div class="modal fade" id="want_form" tabindex="-1" role="dialog" aria-labelledby="iWillLable" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-danger" id="iWantLable">I Want</h4>
                    </div>
                    <div class="modal-body">
                        <div class="input-group well">
                            <span class="input-group-addon text-danger">I Will</span>
                            <input type="text" class="form-control" placeholder="translate your documents">
                        </div>
                        <textarea class="form-control counted" placeholder="Describe it here.... " rows="5"></textarea>
                        <br />

                        <div class="input-group col-lg-5">
                            <span class="input-group-addon text-danger">Tshs</span>
                            <input type="text" class="form-control" placeholder="20,000">
                        </div>

                        <button type="button" class="btn btn-labeled btn-default btn-sm pull-right">
                            <span class="btn-label"><i class="glyphicon glyphicon-picture"></i></span>
                            Choose Thumbnail
                        </button>
                        &nbsp;
                        <button type="button" class="btn btn-labeled btn-default btn-sm pull-right">
                            <span class="btn-label"><i class="glyphicon glyphicon-paperclip"></i></span>
                            Attach Files
                        </button>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                                <input type="checkbox"> I agree with the <span class="text-danger"> Terms & Condition</span>
                        </div>
                        <button type="button" class="btn btn-labeled btn-danger">
                            <span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
                            Create New
                        </button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


<!--
    </body>
</html>
-->