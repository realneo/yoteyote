<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Syntax Highlighting Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-code animation-expandUp"></i>Syntax Highlighting<br><small>Highlighting your code the easy way!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Syntax Highlighting</a></li>
    </ul>
    <!-- END Syntax Highlighting Header -->

    <!-- Syntax Highlighting Content -->
    <div class="row gutter30">
        <div class="col-sm-6">
            <!-- HTML Block -->
            <div class="block">
                <!-- HTML Title -->
                <div class="block-title">
                    <h2>HTML</h2>
                </div>
                <!-- END HTML Title -->

                <!-- HTML Content -->
                <pre class="line-numbers"><code class="language-markup">&lt;pre class=&quot;line-numbers&quot;&gt;&lt;code class=&quot;language-markup&quot;&gt;
HTML code..
&lt;/code&gt;&lt;/pre&gt;</code></pre>
                <!-- END HTML Content -->
            </div>
            <!-- END HTML Block -->

            <!-- CSS Block -->
            <div class="block">
                <!-- CSS Title -->
                <div class="block-title">
                    <h2>CSS</h2>
                </div>
                <!-- END CSS Title -->

                <!-- CSS Content -->
                <pre class="line-numbers"><code class="language-markup">&lt;pre class=&quot;line-numbers&quot;&gt;&lt;code class=&quot;language-css&quot;&gt;
CSS code..
&lt;/code&gt;&lt;/pre&gt;</code></pre>
                <!-- END CSS Content -->
            </div>
            <!-- END CSS Block -->
        </div>
        <div class="col-sm-6">
            <!-- Javascript Block -->
            <div class="block">
                <!-- Javascript Title -->
                <div class="block-title">
                    <h2>Javascript</h2>
                </div>
                <!-- END Javascript Title -->

                <!-- Javascript Content -->
                <pre class="line-numbers"><code class="language-markup">&lt;pre class=&quot;line-numbers&quot;&gt;&lt;code class=&quot;language-javascript&quot;&gt;
Javascript code..
&lt;/code&gt;&lt;/pre&gt;</code></pre>
                <!-- END Javascript Content -->
            </div>
            <!-- END Javascript Block -->

            <!-- PHP Block -->
            <div class="block">
                <!-- PHP Title -->
                <div class="block-title">
                    <h2>PHP</h2>
                </div>
                <!-- END PHP Title -->

                <!-- PHP Content -->
                <pre class="line-numbers"><code class="language-markup">&lt;pre class=&quot;line-numbers&quot;&gt;&lt;code class=&quot;language-php&quot;&gt;
PHP code..
&lt;/code&gt;&lt;/pre&gt;</code></pre>
                <!-- END PHP Content -->
            </div>
            <!-- END PHP Block -->
        </div>
    </div>
    <!-- END Syntax Highlighting Content -->

    <!-- HTML Block -->
    <div class="block">
        <!-- HTML Title -->
        <div class="block-title">
            <h2>HTML <small>Template's Structure</small></h2>
        </div>
        <!-- END HTML Title -->

        <!-- HTML Content -->
        <pre class="line-numbers"><code class="language-markup">&lt;!-- Body --&gt;
&lt;body class=&quot;header-fixed-top&quot;&gt;
    &lt;!-- Left Sidebar --&gt;
    &lt;div id=&quot;sidebar-left&quot;&gt;
        Left Sidebar Content
    &lt;/div&gt;
    &lt;!-- END Left Sidebar --&gt;

    &lt;!-- Right Sidebar --&gt;
    &lt;div id=&quot;sidebar-right&quot;&gt;
        Right Sidebar Content
    &lt;/div&gt;
    &lt;!-- END Right Sidebar --&gt;

    &lt;!-- Page Container --&gt;
    &lt;div id=&quot;page-container&quot;&gt;
        &lt;!-- Header --&gt;
        &lt;header class=&quot;navbar navbar-default navbar-fixed-top&quot;&gt;
            Header Content
        &lt;/header&gt;
        &lt;!-- END Header --&gt;

        &lt;!-- FX Container --&gt;
        &lt;div id=&quot;fx-container&quot; class=&quot;fx-opacity&quot;&gt;
            &lt;!-- Page Content --&gt;
            &lt;div id=&quot;page-content&quot; class=&quot;block&quot;&gt;
                Main Content
            &lt;/div&gt;
            &lt;!-- END Page Content --&gt;

            &lt;!-- Footer --&gt;
            &lt;footer&gt;
                Footer Content
            &lt;/footer&gt;
            &lt;!-- END Footer --&gt;
        &lt;/div&gt;
        &lt;!-- END FX Container --&gt;
    &lt;/div&gt;
    &lt;!-- END Page Container --&gt;
&lt;/body&gt;
&lt;!-- END Body --&gt;</code></pre>
        <!-- END HTML Content -->
    </div>
    <!-- END HTML Block -->

    <!-- CSS Block -->
    <div class="block">
        <!-- CSS Title -->
        <div class="block-title">
            <h2>CSS <small>Stylesheet Structure</small></h2>
        </div>
        <!-- END CSS Title -->

        <!-- CSS Content -->
        <pre class="line-numbers"><code class="language-css">/*
=================================================================
(#shortcode) SECTION
=================================================================
*/

/* Sub section 1 */
selector {
}

/* Sub section 2 */
selector {
}

/*
=================================================================
(#shortcode) SECTION
=================================================================
*/

/* Sub section 1 */
selector {
}

/* Sub section 2 */
selector {
}</code></pre>
        <!-- END CSS Content -->
    </div>
    <!-- END CSS Block -->

    <!-- Javascript Block -->
    <div class="block">
        <!-- Javascript Title -->
        <div class="block-title">
            <h2>Javascript <small>Scroll to top function used in the template</small></h2>
        </div>
        <!-- END Javascript Title -->

        <!-- Javascript Content -->
        <pre class="line-numbers"><code class="language-javascript">/* Scroll to top functionality */
var scrollToTop = function() {

    // Get link
    var link = $('#to-top');

    $(window).scroll(function(){
        // If the user scrolled a bit (150 pixels) show the link
        if ($(this).scrollTop() > 150) {
            link.fadeIn(100);
        } else {
            link.fadeOut(100);
        }
    });

    // On click get to top
    link.click(function(){
        $('html, body').animate({ scrollTop: 0 }, 200);
        return false;
    });
};</code></pre>
        <!-- END Javascript Content -->
    </div>
    <!-- END Javascript Block -->

    <!-- PHP Block -->
    <div class="block">
        <!-- PHP Title -->
        <div class="block-title">
            <h2>PHP <small>Example Code</small></h2>
        </div>
        <!-- END PHP Title -->

        <!-- PHP Content -->
        <pre class="line-numbers"><code class="language-php">&lt;?php
// Comment
class Test {
    function home() {
        // ...
    }
}
?&gt;</code></pre>
        <!-- END PHP Content -->
    </div>
    <!-- END PHP Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/bottom'); ?>