<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Message Center Header -->
    <div class="block-header">
        <div class="row remove-margin">
            <div class="col-sm-6">
                <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
                <a href="" class="header-title-link">
                    <h1><i class="fa fa-envelope-o animation-expandUp"></i> Message Center<br><small>All your messages in order</small></h1>
                </a>
            </div>
            <div class="col-sm-6">
                <!-- Statistics Row -->
                <div class="row">
                    <div class="col-xs-4">
                        <!-- Compose Modal Link -->
                        <a href="#modal-compose" class="header-link" data-toggle="modal">
                            <h1 class="animation-pullDown"><i class="fa fa-pencil"></i><br><small>Compose</small></h1>
                        </a>
                        <!-- END Compose Modal Link -->

                        <!-- Compose Modal -->
                        <div id="modal-compose" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h3 class="modal-title">Compose new message</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form action="page_special_message_center.php" method="post" onsubmit="return false;">
                                            <div class="form-group">
                                                <!-- We initialize the chosen plugin at the bottom of this page after the modal is shown -->
                                                <select id="compose-people" name="compose-people" class="modal-select-chosen" data-placeholder="Where?" multiple>
                                                    <option value="1">Michael</option>
                                                    <option value="2">John</option>
                                                    <option value="3">Estelle</option>
                                                    <option value="4">Jim</option>
                                                    <option value="4">Ann</option>
                                                </select>
                                            </div>
                                            <textarea id="compose-message" name="compose-message" rows="4" class="form-control" placeholder="What?"></textarea>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-angle-right"></i> Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Compose Modal -->
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:void(0)" class="header-link">
                            <h1 class="animation-pullDown">5<br><small>Important</small></h1>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:void(0)" class="header-link">
                            <h1 class="animation-pullDown">7<br><small>Inbox</small></h1>
                        </a>
                    </div>
                </div>
                <!-- END Statistics Row -->
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-bookmark"></i></li>
        <li><a href="">Message Center</a></li>
    </ul>
    <!-- END Message Center Header -->

    <!-- Message Center Content -->
    <div class="row gutter30">
        <!-- Categories and Messages List -->
        <div class="col-md-6">
            <div class="row gutter30">
                <!-- Categories -->
                <div class="col-sm-6 col-md-5 block-section ms-categories">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="javascript:void(0)" data-cat="1"><span class="badge pull-right">5</span><i class="fa fa-bolt fa-fw"></i> Important</a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="javascript:void(0)" data-cat="2"><span class="badge pull-right">7</span><i class="fa fa-inbox fa-fw"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="3"><i class="fa fa-share fa-fw"></i> Sent</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="4"><i class="fa fa-suitcase fa-fw"></i> Archive</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="5"><i class="fa fa-trash-o fa-fw"></i> Trash</a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-stacked">
                        <li>
                            <a href="javascript:void(0)" data-cat="6"><span class="badge pull-right">160</span><i class="fa fa-tags fa-fw"></i> Personal</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="7"><span class="badge pull-right">420</span><i class="fa fa-tags fa-fw"></i> Work</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="8"><span class="badge pull-right">320</span><i class="fa fa-tags fa-fw"></i> Projects</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-cat="9"><span class="badge pull-right">90</span><i class="fa fa-tags fa-fw"></i> Vacation</a>
                        </li>
                    </ul>
                    <form action="page_special_message_center.php" method="post" onsubmit="return false;">
                        <div class="input-group input-group-sm">
                            <input type="text" id="new-tag" name="new-tag" class="form-control" placeholder="New tag..">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- END Categories -->

                <!-- Messages List -->
                <div class="col-sm-6 col-md-7">
                    <!-- List Block -->
                    <div class="block full">
                        <!-- List Title -->
                        <div class="block-title">
                            <h2>Messages List</h2>
                        </div>
                        <!-- END List Title -->

                        <!-- List Content -->
                        <div class="block-section">
                            <form action="page_special_message_center.php" method="post" onsubmit="return false;">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="ms-message-list list-group">
                            <a href="javascript:void(0)" class="list-group-item active">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>5 min ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>3 hours ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>Yesterday from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>3 days ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>5 days ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>1 week ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>1 week ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>2 weeks ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>3 weeks ago from John Doe</em></small>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item">
                                <h4 class="list-group-item-heading">Message Title</h4>
                                <p class="list-group-item-text">Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                <small><em>1 month ago from John Doe</em></small>
                            </a>
                        </div>
                        <!-- END List Content -->
                    </div>
                    <!-- END List Block -->
                </div>
                <!-- END Messages List -->
            </div>
        </div>
        <!-- END Categories and Messages List -->

        <!-- Main Message -->
        <div class="col-md-6">
            <!-- Message Block -->
            <div class="block full">
                <!-- Message Title -->
                <div class="block-title">
                    <div class="block-options">
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Reply"><i class="fa fa-reply"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Forward"><i class="fa fa-share"></i></a>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Archive"><i class="fa fa-briefcase"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary enable-tooltip dropdown-toggle" data-toggle="dropdown" title="Add tag"><i class="fa fa-tag"></i> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)">Personal</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check-square-o pull-right"></i> Work</a></li>
                                <li><a href="javascript:void(0)"><i class="fa fa-check-square-o pull-right"></i> Projects</a></li>
                                <li><a href="javascript:void(0)">Vacation</a></li>
                            </ul>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Spam"><i class="fa fa-flag"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END Message Title -->

                <!-- Message Content -->
                <div class="ms-message">
                    <div class="clearfix">
                        <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="avatar" class="img-circle pull-right">
                        <h3>Message Title <small><br><a href="page_special_user_profile.php">John Doe</a></small></h3>
                        <br><small><em>5 min ago</em></small>
                    </div>
                    <div class="ms-message-content">
                        <p>Dear Admin,</p>
                        <p>Lorem ipsum dolor sit amet, consectetur <a href="javascript:void(0)">adipiscing</a> elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                        <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</p>
                        <p>Best Regards</p>
                        <p>John</p>
                    </div>
                    <form action="page_special_message_center.php" method="post" onsubmit="return false;">
                        <div class="form-group">
                            <textarea id="reply-msg" name="reply-msg" class="form-control textarea-editor" rows="3" placeholder="Reply.."></textarea>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Send</button>
                    </form>
                </div>
                <!-- END Message Content -->
            </div>
            <!-- END Message Block -->
        </div>
        <!-- END Main Message -->
    </div>
    <!-- END Message Center Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
$(function(){
    // Initialize chosen plugin after the modal opens
    $('#modal-compose').on('shown.bs.modal', function () {
        $('.modal-select-chosen').chosen({ width: '100%' });
    });

    // Set up message list and message container scrolling functionality
    $('.ms-message-list')
        .slimScroll({ height: 610, color: '#000000', size: '3px', touchScrollStep: 100 });

    // Message Center category links
    var catList = $('.ms-categories');

    $('a', catList).click(function(){
        $('li', catList).removeClass('active');
        $(this).parent().addClass('active');

        // Here you could load your messages in #ms-message-list using the data-cat value of each category link..
        var catId = $(this).data('cat');
    });
});
</script>

<?php $this->load->view('partials/bottom'); ?>