<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Navigation - Extras Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-location-arrow animation-expandUp"></i>Navigation - Extras<br><small>Manipulate the sidebars with ease and use various elements to enrich your UX!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-rocket"></i></li>
        <li>Elements</li>
        <li><a href="">Navigation - Extras</a></li>
    </ul>
    <!-- END Navigation - Extras Header -->

    <!-- Swipe Area Block -->
    <div class="block">
        <!-- Swipe Area Title -->
        <div class="block-title">
            <h2>Swipe Enabled Area (doesn't work on a pinned sidebar!)</h2>
        </div>
        <!-- END Swipe Area Title -->

        <!-- Swipe Area Content -->
        <p>
            You can <strong>swipe Left/Right</strong> or <strong>click and drag Left/Right</strong> over the following area to open and close the sidebars!
            Just by adding a class: <code>.sidebars-swipe</code>
        </p>
        <div class="alert alert-warning sidebars-swipe" style="height: 200px;">
        </div>
        <!-- END Swipe Area Content -->
    </div>
    <!-- END Swipe Area Block -->

    <!-- Handle Sidebars Row -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Handle Left Sidebar Block -->
            <div class="block">
                <!-- Handle Left Sidebar Title -->
                <div class="block-title text-right">
                    <h2>Handle Left Sidebar (doesn't work if pinned!)</h2>
                </div>
                <!-- END Handle Left Sidebar Title -->

                <!-- Handle Left Sidebar Content -->
                <div class="block-section text-right">
                    <a href="javascript:void(0)" class="btn btn-danger" onclick="webApp.sidebars('close-left');">Close</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="webApp.sidebars('open-left');">Open</a>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="webApp.sidebars('toggle-left');">Toggle</a>
                </div>
                <!-- END Handle Left Sidebar Content -->
            </div>
            <!-- END Handle Left Sidebar Block -->
        </div>
        <div class="col-md-6">
            <!-- Handle Right Sidebar Block -->
            <div class="block">
                <!-- Handle Right Sidebar Title -->
                <div class="block-title">
                    <h2>Handle Right Sidebar (doesn't work if pinned!)</h2>
                </div>
                <!-- END Handle Right Sidebar Title -->

                <!-- Handle Right Sidebar Content -->
                <div class="block-section text-left">
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="webApp.sidebars('toggle-right');">Toggle</a>
                    <a href="javascript:void(0)" class="btn btn-success" onclick="webApp.sidebars('open-right');">Open</a>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick="webApp.sidebars('close-right');">Close</a>
                </div>
                <!-- END Handle Right Sidebar Content -->
            </div>
            <!-- END Handle Right Sidebar Block -->
        </div>
    </div>
    <!-- END Handle Sidebars Row -->

    <!-- List Group Block -->
    <div class="block">
        <!-- List Group Title -->
        <div class="block-title">
            <h2>List Group</h2>
        </div>
        <!-- END List Group Title -->

        <!-- List Group Content -->
        <div class="row gutter30">
            <div class="col-md-6">
                <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">3</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item active">
                        <span class="badge">2</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">12</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">7</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="list-group">
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">5</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">14</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">25</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                    <a href="javascript:void(0)" class="list-group-item">
                        <span class="badge">1</span>
                        <h4 class="list-group-item-heading">Element's Title</h4>
                        <p class="list-group-item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </a>
                </div>
            </div>
        </div>
        <!-- END List Group Content -->
    </div>
    <!-- END List Group Block -->

    <!-- Navs Block -->
    <div class="block">
        <!-- Navs Title -->
        <div class="block-title">
            <h2>Navigation Elements</h2>
        </div>
        <!-- END Navs Title -->

        <!-- Navs Content -->
        <div class="row gutter30">
            <!-- Tabs -->
            <div class="col-md-4">
                <div class="block-section">
                    <h4 class="sub-header">Tabs <small><code>.nav</code> <code>.nav-tabs</code></small></h4>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)">Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-cog"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- END Tabs -->

            <!-- Pills -->
            <div class="col-md-4">
                <div class="block-section">
                    <h4 class="sub-header">Pills <small><code>.nav</code> <code>.nav-pills</code></small></h4>
                    <ul class="nav nav-pills">
                        <li class="active"><a href="javascript:void(0)">Home</a></li>
                        <li><a href="javascript:void(0)">Profile</a></li>
                        <li class="disabled"><a href="javascript:void(0)">Disabled</a></li>
                    </ul>
                </div>
            </div>
            <!-- END Pills -->

            <!-- Stacked Pills -->
            <div class="col-md-4">
                <div class="block-section">
                    <h4 class="sub-header">Stacked Pills <small><code>.nav</code> <code>.nav-pills</code> <code>.nav-stacked</code></small></h4>
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="javascript:void(0)"><span class="badge pull-right">5</span>Home</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><span class="badge pull-right">2</span>Profile</a>
                        </li>
                        <li class="disabled">
                            <a href="javascript:void(0)"><span class="badge pull-right">3</span>Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- END Stacked Pills -->
        </div>
        <!-- END Navs Content -->
    </div>
    <!-- END Navs Block -->

    <!-- Default Tabs Block -->
    <div class="block full">
        <!-- Default Working Tabs Title -->
        <div class="block-title">
            <h2>Default Working Tabs <small>Simple to use and easy to customize</small></h2>
        </div>
        <!-- END Default Working Tabs Title -->

        <!-- Default Working Tabs Content -->
        <ul class="nav nav-tabs push" data-toggle="tabs">
            <li class="active"><a href="#example-tabs-home">Home</a></li>
            <li><a href="#example-tabs-profile">Profile</a></li>
            <li><a href="#example-tabs-messages" data-toggle="tooltip" title="Messages"><i class="fa fa-envelope-o"></i></a></li>
            <li><a href="#example-tabs-settings" data-toggle="tooltip" title="Settings"><i class="fa fa-cogs"></i></a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="example-tabs-home">Home..</div>
            <div class="tab-pane" id="example-tabs-profile">Profile..</div>
            <div class="tab-pane" id="example-tabs-messages">Messages..</div>
            <div class="tab-pane" id="example-tabs-settings">Settings..</div>
        </div>
        <!-- END Default Working Tabs Content -->
    </div>
    <!-- END Default Working Tabs Block -->

    <!-- Block Tabs -->
    <div class="block block-tabs full">
        <!-- Block Tabs Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <div class="btn-group">
                    <a class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">Options <span class="caret"></span></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li class="disabled"><a href="javascript:void(0)">Disabled</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Another Action</a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#example-tabs2-home">Home</a></li>
                <li><a href="#example-tabs2-profile">Profile</a></li>
                <li><a href="#example-tabs2-options" data-toggle="tooltip" title="Settings"><i class="fa fa-cogs"></i></a></li>
            </ul>
        </div>
        <!-- END Block Tabs Title -->

        <!-- Tabs Content -->
        <div class="tab-content">
            <div class="tab-pane active" id="example-tabs2-home">Working block tabs..</div>
            <div class="tab-pane" id="example-tabs2-profile">Profile..</div>
            <div class="tab-pane" id="example-tabs2-options">Settings..</div>
        </div>
        <!-- END Tabs Content -->
    </div>
    <!-- END Block Tabs -->

    <!-- Pager Block -->
    <div class="block">
        <!-- Pager Title -->
        <div class="block-title">
            <h2>Pager <small>A <code>&lt;ul&gt;</code> with <code>.pager</code> class. You can use only icons, only text or both!</small></h2>
        </div>
        <!-- END Pager Title -->

        <!-- Pager Content -->
        <div class="row gutter30">
            <div class="col-md-3">
                <div class="block full">
                    <ul class="pager">
                        <li><a href="javascript:void(0)">Link</a></li>
                        <li><a href="javascript:void(0)">Link</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block full">
                    <ul class="pager">
                        <li class="previous disabled"><a href="javascript:void(0)"><i class="fa fa-arrow-left"></i> Prev</a></li>
                        <li class="next"><a href="javascript:void(0)">Next <i class="fa fa-arrow-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block full">
                    <ul class="pager">
                        <li class="previous"><a href="javascript:void(0)">Prev</a></li>
                        <li class="next disabled"><a href="javascript:void(0)">Next</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="block full">
                    <ul class="pager">
                        <li class="previous"><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="next"><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Pager Content -->
    </div>
    <!-- END Pager Block -->

    <!-- Pagination Block -->
    <div class="block">
        <!-- Pagination Title -->
        <div class="block-title">
            <h2>Pagination <small>A <code>&lt;ul&gt;</code> with <code>.pagination</code> class</small></h2>
        </div>
        <!-- END Pagination Title -->

        <!-- Pagination Content -->
        <!-- Default Pagination and States -->
        <div class="row gutter30">
            <div class="col-md-6">
                <h4 class="sub-header">Default Pagination</h4>
                <div class="text-center">
                    <ul class="pagination">
                        <li><a href="javascript:void(0)">&laquo;</a></li>
                        <li><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="sub-header">Active and Disabled States</h4>
                <div class="text-center">
                    <ul class="pagination">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Default Pagination and States -->

        <!-- Pagination Sizes and Icons -->
        <h4 class="sub-header">Sizes and Icons <small><code>.pagination .pagination-lg</code> <code>.pagination</code> <code>.pagination .pagination-sm</code></small></h4>
        <!-- Pagination Row -->
        <div class="row gutter30">
            <div class="col-md-4 text-center">
                <ul class="pagination pagination-lg">
                    <li><a href="javascript:void(0)"><i class="fa fa-arrow-left"></i></a></li>
                    <li><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-arrow-right"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <ul class="pagination">
                    <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                    <li><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center">
                <ul class="pagination pagination-sm">
                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div>
        </div>
        <!-- END Pagination Row -->
        <!-- END Pagination Sizes and Icons -->

        <!-- Pagination Alignment -->
        <h4 class="sub-header">Alignments <small>The same as aligning a paragraph (using <code>.text-center</code> or <code>.text-right</code> on pagination's container)</small></h4>
        <div>
            <ul class="pagination">
                <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <div class="text-center">
            <ul class="pagination">
                <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <div class="text-right">
            <ul class="pagination">
                <li><a href="javascript:void(0)"><i class="fa fa-angle-left"></i></a></li>
                <li><a href="javascript:void(0)">1</a></li>
                <li><a href="javascript:void(0)">2</a></li>
                <li><a href="javascript:void(0)">3</a></li>
                <li><a href="javascript:void(0)">4</a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a></li>
            </ul>
        </div>
        <!-- END Pagination Alignment -->
        <!-- END Pagination Content -->
    </div>
    <!-- END Pagination Block -->

    <!-- Breadcrumb Block -->
    <div class="block">
        <!-- Breadcrumb Title -->
        <div class="block-title">
            <h2>Breadcrumb <small>A <code>&lt;ol&gt;</code> list with <code>.breadcrumb</code> class</small></h2>
        </div>
        <!-- END Breadcrumb Title -->

        <!-- Breadcrumb Content -->
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)">Home</a></li>
            <li><a href="javascript:void(0)">Profile</a></li>
            <li class="active">Settings</li>
        </ol>
        <!-- END Breadcrumb Content -->
    </div>
    <!-- END Breadcrumb Block -->

    <!-- Tooltips, Popovers and Modals Block -->
    <div class="block">
        <!-- Popovers, Tooltips and Modals Title -->
        <div class="block-title">
            <h2>Tooltips, Popovers and Modals</h2>
        </div>
        <!-- END Tooltips, Popovers and Modals Title -->

        <!-- Tooltips, Popovers and Modals Content -->
        <div class="row gutter30">
            <div class="col-md-4">
                <!-- Tooltips -->
                <div class="block-section text-center">
                    <h4 class="sub-header">Tooltips</h4>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="General tooltip!">Tooltip</a><br>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Tooltip on top!">Tooltip Top</a><br>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Tooltip on right!">Tooltip Right</a><br>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom!">Tooltip Bottom</a><br>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="left" title="Tooltip on left!">Tooltip Left</a><br>
                </div>
                <!-- END Tooltips -->
            </div>
            <div class="col-md-4">
                <!-- Popovers -->
                <div class="block-section text-center">
                    <h4 class="sub-header">Popovers</h4>
                    <button class="btn btn-default" data-toggle="popover" data-content="This is an information popup! Use it easily with the content you want!" title="Popover!">Popover</button>
                    <button class="btn btn-default" data-toggle="popover" data-content="This is an information popover! Use it easily with the content you want!" data-placement="top" title="Popover on top!"><i class="fa fa-chevron-up"></i></button>
                    <button class="btn btn-default" data-toggle="popover" data-content="This is an information popover! Use it easily with the content you want!" data-placement="right" title="Popover on right!"><i class="fa fa-chevron-right"></i></button>
                    <button class="btn btn-default" data-toggle="popover" data-content="This is an information popover! Use it easily with the content you want!" data-placement="bottom" title="Popover on bottom!"><i class="fa fa-chevron-down"></i></button>
                    <button class="btn btn-default" data-toggle="popover" data-content="This is an information popover! Use it easily with the content you want!" data-placement="left" title="Popover on left!"><i class="fa fa-chevron-left"></i></button>
                </div>
                <!-- END Popovers -->
            </div>
            <div class="col-md-4">
                <!-- Modals -->
                <!-- For advanced modal usage you can check out http://getbootstrap.com/javascript/#modals -->
                <div class="block-section text-center">
                    <h4 class="sub-header">Modals</h4>
                    <!-- Modal links -->
                    <a href="#modal-regular" class="btn btn-default" data-toggle="modal">Modal</a>
                    <a href="#modal-regular2" class="btn btn-default" data-toggle="modal">Modal (fade in)</a>
                    <a href="#modal-regular3" class="btn btn-default" data-toggle="modal">Modal with Tabs</a>
                </div>
                <!-- END Modals -->

                <!-- Regular Modal -->
                <div id="modal-regular" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body">
                                Modal Content..
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal -->

                <!-- Regular Modal 2 -->
                <div id="modal-regular2" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Modal Title</h4>
                            </div>
                            <div class="modal-body">
                                Modal Content..
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal 2 -->

                <!-- Regular Modal 3 -->
                <div id="modal-regular3" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <ul class="nav nav-tabs" data-toggle="tabs">
                                    <li class="active"><a href="#modal-tabs-profile">Profile</a></li>
                                    <li><a href="#modal-tabs-settings" data-toggle="tooltip" title="Settings"><i class="fa fa-cogs"></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="modal-tabs-profile">Profile..</div>
                                    <div class="tab-pane" id="modal-tabs-settings">Settings..</div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Regular Modal 3 -->
            </div>
        </div>
        <!-- END Tooltips, Popovers and Modals Content -->
    </div>
    <!-- END Tooltips, Popovers and Modals Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/bottom'); ?>