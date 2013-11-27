<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Typography Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-font animation-expandUp"></i>Typography<br><small>Headings, Paragraphs, Blockquotes, Alerts, Labels, Lists and more, all looking great!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-rocket"></i></li>
        <li>Elements</li>
        <li><a href="">Typography</a></li>
    </ul>
    <!-- END Typography Header -->

    <!-- Headings Block -->
    <div class="block full">
        <!-- Headings Title -->
        <div class="block-title">
            <div class="block-options pull-right">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary toggle-headings">Toggle .page-header</a>
            </div>
            <h2>Headings</h2>
        </div>
        <!-- END Headings Title -->

        <!-- Headings Content -->
        <div class="row gutter30 headings-container">
            <div class="col-md-6">
                <h1>h1. Heading</h1>
                <h2>h2. Heading</h2>
                <h3>h3. Heading</h3>
                <h4>h4. Heading</h4>
                <h5>h5. Heading</h5>
                <h6>h6. Heading</h6>
            </div>
            <div class="col-md-6">
                <h1 class="text-danger">h1. Heading</h1>
                <h2 class="text-success">h2. Heading</h2>
                <h3 class="text-warning">h3. Heading</h3>
                <h4 class="text-primary">h4. Heading</h4>
                <h5 class="text-info">h5. Heading</h5>
                <h6 class="text-muted">h6. Heading</h6>
            </div>
        </div>
        <!-- END Headings Content -->
    </div>
    <!-- END Headings Block -->

    <!-- Text Block -->
    <div class="block">
        <!-- Text Title -->
        <div class="block-title">
            <h2>Text</h2>
        </div>
        <!-- END Text Title -->

        <!-- Text Content -->
        <!-- Paragraphs and Links -->
        <div class="row gutter30">
            <div class="col-md-6">
                <p class="lead">This is a lead paragraph!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="javascript:void(0)">Maecenas</a> ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque</p>
            </div>
            <div class="col-md-6">
                <p><em>Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas  <a href="javascript:void(0)">fringilla</a> enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</em></p>
                <p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Maecenas <a href="javascript:void(0)">ultrices</a>, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate.</p>
            </div>
        </div>
        <!-- END Paragraphs and Links -->

        <!-- Emphasis and Well -->
        <div class="row gutter30">
            <!-- Well Paragraph -->
            <div class="col-md-6">
                <h4>Emphasis Text</h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><code>.text-muted</code></td>
                            <td><a href="javascript:void(0)" class="text-muted">Link</a> | <span class="text-muted">Muted</span></td>
                        </tr>
                        <tr>
                            <td><code>.text-primary</code></td>
                            <td><a href="javascript:void(0)">Link</a> | <span class="text-primary">Primary</span></td>
                        </tr>
                        <tr>
                            <td><code>.text-success</code></td>
                            <td><a href="javascript:void(0)" class="text-success">Link</a> | <span class="text-success">Success</span></td>
                        </tr>
                        <tr>
                            <td><code>.text-info</code></td>
                            <td><a href="javascript:void(0)" class="text-info">Link</a> | <span class="text-info">Info</span></td>
                        </tr>
                        <tr>
                            <td><code>.text-warning</code></td>
                            <td><a href="javascript:void(0)" class="text-warning">Link</a> | <span class="text-warning">Warning</span></td>
                        </tr>
                        <tr>
                            <td><code>.text-danger</code></td>
                            <td><a href="javascript:void(0)" class="text-danger">Link</a> | <span class="text-danger">Danger</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Well Paragraph -->

            <!-- Emphasis Text -->
            <div class="col-md-6">
                <h4>Well Paragraph</h4>
                <p class="well well-sm"><strong>Small Well</strong> Gives the paragraph an inset effect! <code>.well</code> <code>.well-sm</code></p>
                <p class="well"><strong>Normal Well</strong> Gives the paragraph an inset effect! <code>.well</code></p>
                <p class="well well-lg"><strong>Large Well</strong> Gives the paragraph an inset effect! <code>.well</code> <code>.well-lg</code></p>
            </div>
            <!-- END Emphasis Text -->
        </div>
        <!-- END Emphasis and Well -->
        <!-- END Text Content -->
    </div>
    <!-- END Text Block -->

    <!-- Blockquotes Row -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Blockquote Left Block -->
            <div class="block">
                <!-- Blockquote Left Title -->
                <div class="block-title">
                    <h4>Blockquote Left</h4>
                </div>
                <!-- END Blockquote Left Title -->

                <!-- Blockquote Left Content -->
                <blockquote>
                    <p>This is a blockquote with source info</p>
                    <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                </blockquote>
                <!-- END Blockquote Left Content -->
            </div>
            <!-- END Blockquote Left Block -->
        </div>
        <div class="col-md-6">
            <!-- Blockquote Right Block -->
            <div class="block clearfix">
                <!-- Blockquote Right Title -->
                <div class="block-title">
                    <h4>Blockquote Right</h4>
                </div>
                <!-- END Blockquote Right Title -->

                <!-- Blockquote Right Content -->
                <blockquote class="pull-right">
                    <p>This is a blockquote pulled right</p>
                    <small>Someone famous <cite title="Source Title">Source Title</cite></small>
                </blockquote>
                <!-- END Blockquote Right Content -->
            </div>
            <!-- END Blockquote Right Block -->
        </div>
    </div>
    <!-- END Blockquotes Row -->

    <!-- Alerts Row -->
    <div class="row gutter30">
        <div class="col-md-3">
            <!-- Success Alert Block -->
            <div class="block">
                <!-- Success Alert Title -->
                <div class="block-title">
                    <h2>Success Alert</h2>
                </div>
                <!-- END Success Alert Title -->

                <!-- Success Alert Content -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fa fa-check"></i> Success</h4> Upgrade <a href="javascript:void(0)" class="alert-link">finished</a>!
                </div>
                <!-- END Success Alert Content -->
            </div>
            <!-- END Success Alert Block -->
        </div>
        <div class="col-md-3">
            <!-- Info Alert Block -->
            <div class="block">
                <!-- Info Alert Title -->
                <div class="block-title">
                    <h2>Info Alert</h2>
                </div>
                <!-- END Info Alert Title -->

                <!-- Info Alert Content -->
                <div class="alert alert-info alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fa fa-info-circle"></i> Info</h4> Nice day <a href="javascript:void(0)" class="alert-link">today</a>!
                </div>
                <!-- END Info Alert Content -->
            </div>
            <!-- END Info Alert Block -->
        </div>
        <div class="col-md-3">
            <!-- Warning Alert Block -->
            <div class="block">
                <!-- Warning Alert Title -->
                <div class="block-title">
                    <h2>Warning Alert</h2>
                </div>
                <!-- END Warning Alert Title -->

                <!-- Warning Alert Content -->
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fa fa-exclamation-triangle"></i> Warning</h4>Be <a href="javascript:void(0)" class="alert-link">careful</a>!
                </div>
                <!-- END Warning Alert Content -->
            </div>
            <!-- END Warning Alert Block -->
        </div>
        <div class="col-md-3">
            <!-- Danger Alert Block -->
            <div class="block">
                <!-- Danger Alert Title -->
                <div class="block-title">
                    <h2>Danger Alert</h2>
                </div>
                <!-- END Danger Alert Title -->

                <!-- Danger Alert Content -->
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="fa fa-times"></i> Error</h4> Oops.. it <a href="javascript:void(0)" class="alert-link">failed</a>!
                </div>
                <!-- END Danger Alert Content -->
            </div>
            <!-- END Danger Alert Block -->
        </div>
    </div>
    <!-- END Alerts Row -->

    <!-- Labels and Badges -->
    <div class="block full">
        <!-- Labels and Badges Title -->
        <div class="block-title">
            <h2>Labels and Badges</h2>
        </div>
        <!-- END Labels and Badges Title -->

        <!-- Labels and Badges Content -->
        <h4>Labels</h4>
        <div class="row gutter30">
            <!-- Labels 1 -->
            <div class="col-md-6">
                <table class="table table-borderless remove-margin">
                    <tbody>
                        <tr>
                            <td><code>.label</code> <code>.label-default</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-default">Default</span></div>
                                <div class="push"><span class="label label-default"><i class="fa fa-pencil"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-default">Link</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td><code>.label</code> <code>.label-primary</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-primary">Primary</span></div>
                                <div class="push"><span class="label label-primary"><i class="fa fa-envelope"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-primary">Link</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td><code>.label</code> <code>.label-info</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-info">Info</span></div>
                                <div class="push"><span class="label label-info"><i class="fa fa-info-circle"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-info">Link</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Labels 1 -->

            <!-- Labels 2 -->
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td><code>.label</code> <code>.label-success</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-success">Success</span></div>
                                <div class="push"><span class="label label-success"><i class="fa fa-check"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-success">Link</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td><code>.label</code> <code>.label-warning</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-warning">Warning</span></div>
                                <div class="push"><span class="label label-warning"><i class="fa fa-exclamation-triangle"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-warning">Link</a></div>
                            </td>
                        </tr>
                        <tr>
                            <td><code>.label</code> <code>.label-danger</code></td>
                            <td class="text-right">
                                <div class="push"><span class="label label-danger">Danger</span></div>
                                <div class="push"><span class="label label-danger"><i class="fa fa-times"></i></span></div>
                                <div><a href="javascript:void(0)" class="label label-danger">Link</a></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- END Labels 2 -->
        </div>
        <h4>Badges</h4>
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td><code>.badge</code></td>
                    <td class="text-right">
                        <span class="badge">Badge</span>
                        <span class="badge">25</span>
                        <span class="badge"><i class="fa fa-truck"></i></span>
                    </td>
                </tr>
            </tbody>
        </table>
        <!-- END Labels and Badges Content -->
    </div>
    <!-- END Labels and Badges Block -->

    <!-- Lists Row -->
    <div class="row gutter30">
        <div class="col-md-3">
            <!-- Ordered List Block -->
            <div class="block full">
                <!-- Ordered List Title -->
                <div class="block-title">
                    <h2>Ordered <small><code>&lt;ol&gt;</code></small></h2>
                </div>
                <!-- END Ordered List Title -->

                <!-- Ordered List Content -->
                <ol>
                    <li>First item</li>
                    <li>Second item</li>
                    <li>Third item</li>
                    <li>
                        Sublist
                        <ol>
                            <li>First subitem</li>
                            <li>Second subitem</li>
                            <li>Third subitem</li>
                        </ol>
                    </li>
                    <li>Another item</li>
                </ol>
                <!-- END Ordered List Content -->
            </div>
            <!-- END Ordered List Block -->
        </div>
        <div class="col-md-3">
            <!-- Unordered List Block -->
            <div class="block full">
                <!-- Unordered List Title -->
                <div class="block-title">
                    <h2>Unordered <small><code>&lt;ul&gt;</code></small></h2>
                </div>
                <!-- END Unordered List Title -->

                <!-- Unordered List Content -->
                <ul>
                    <li>First item</li>
                    <li>Second item</li>
                    <li>Third item</li>
                    <li>
                        Sublist
                        <ul>
                            <li>First subitem</li>
                            <li>Second subitem</li>
                            <li>Third subitem</li>
                        </ul>
                    </li>
                    <li>Another item</li>
                </ul>
                <!-- END Unordered List Content -->
            </div>
            <!-- END Unordered List Block -->
        </div>
        <div class="col-md-3">
            <!-- Unstyled List Block -->
            <div class="block full">
                <!-- Unstyled List Title -->
                <div class="block-title">
                    <h2>Unstyled <small><code>.list-unstyled</code></small></h2>
                </div>
                <!-- END Unstyled List Title -->

                <!-- Unstyled List Content -->
                <ul class="list-unstyled">
                    <li>First item</li>
                    <li>Second item</li>
                    <li>Third item</li>
                    <li>
                        Sublist
                        <ul class="list-unstyled">
                            <li>First subitem</li>
                            <li>Second subitem</li>
                            <li>Third subitem</li>
                        </ul>
                    </li>
                    <li>Another item</li>
                </ul>
                <!-- END Unstyled List Content -->
            </div>
            <!-- END Unstyled List Block -->
        </div>
        <div class="col-md-3">
            <!-- Icon List Block -->
            <div class="block full">
                <!-- Icon List Title -->
                <div class="block-title">
                    <h2>Icon <small><code>.fa-ul</code></small></h2>
                </div>
                <!-- END Icon List Title -->

                <!-- Icon List Content -->
                <ul class="fa-ul">
                    <li><i class="fa fa-check fa-li text-success"></i>First item</li>
                    <li><i class="fa fa-check fa-li text-success"></i>Second item</li>
                    <li><i class="fa fa-check fa-li text-success"></i>Third item</li>
                    <li>
                        <i class="fa fa-check fa-li text-success"></i>Sublist
                        <ul class="fa-ul">
                            <li><i class="fa fa-youtube fa-li text-danger"></i>First subitem</li>
                            <li><i class="fa fa-pinterest fa-li text-danger"></i>Second subitem</li>
                            <li><i class="fa fa-flickr fa-li text-danger"></i>Third subitem</li>
                        </ul>
                    </li>
                    <li><i class="fa fa-check fa-li text-success"></i>Another item</li>
                </ul>
                <!-- END Icon List Content -->
            </div>
            <!-- END Icon List Block -->
        </div>
    </div>
    <!-- END Lists Row -->

    <!-- Description Lists Block -->
    <div class="block">
        <!-- Description Lists Title -->
        <div class="block-title">
            <h2>Description Lists</h2>
        </div>
        <!-- END Description Lists Title -->

        <!-- Description Lists Content -->
        <div class="row gutter30">
            <div class="col-md-6">
                <h4>Default</h4>
                <dl>
                    <dt>Description lists</dt>
                    <dd>A description list is perfect for defining terms.</dd>
                    <dt>Euismod</dt>
                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                    <dt>Malesuada porta</dt>
                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                </dl>
            </div>
            <div class="col-md-6">
                <h4>Horizontal</h4>
                <dl class="dl-horizontal">
                    <dt>Description lists</dt>
                    <dd>A description list is perfect for defining terms.</dd>
                    <dt>Euismod</dt>
                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                    <dt>Malesuada porta</dt>
                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                </dl>
            </div>
        </div>
        <!-- END Description Lists Content -->
    </div>
    <!-- END Description Lists Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* Toggle .page-header class */
        $('.toggle-headings').click(function(){
           $('h1, h2, h3, h4, h5, h6', '.headings-container').toggleClass('page-header');
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>