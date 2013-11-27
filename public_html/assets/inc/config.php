<?php
/**
 * config.php
 *
 * Author: pixelcave
 *
 * Configuration file. It containts variables used in the template and the main menu auto creation function
 *
 */

/* Template variables */
$template = array(
    'name'          => 'FreshUI',
    'version'       => '1.4',
    'author'        => 'pixelcave',
    'title'         => 'FreshUI - Premium Web App and Admin Template',
    'description'   => 'FreshUI is a Premium Web App and Admin Template created by pixelcave and published on Themeforest.',
    // ''               empty to remove full width from the page (< 992px: 100%, > 992px: 95%, 1440px max width)
    // 'full-width'     for a full width page (100%, 1920px max width)
    'page'          => '',
    // 'navbar-default' for a light header
    // 'navbar-inverse' for a dark header
    'header_navbar' => 'navbar-default',
    // 'navbar-fixed-top'     for a top fixed header
    // 'navbar-fixed-bottom'  for a bottom fixed header
    'header'        => 'navbar-fixed-top',
    // ''                  left sidebar will open only from the top left toggle button (better website performance)
    // 'enable-hover'      will make a small portion of left sidebar visible, so that it can be opened with a mouse hover (> 1200px) (may affect website performance)
    'sidebar_left'  => 'enable-hover',
    // ''                  right sidebar will open only from the top right toggle button (better website performance)
    // 'enable-hover'      will make a small portion of right sidebar visible, so that it can be opened with a mouse hover (> 1200px) (may affect website performance)
    'sidebar_right'  => '',
    // ''                                            empty for default behavior
    // 'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
    // 'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
    // 'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
    'navigation'    => '',
    // All effects apply in resolutions larger than 1200px width
    // 'fx-none'           remove all effects from main content when one of the sidebars are open (better website performance)
    // 'fx-opacity'        opacity effect
    // 'fx-move'           move effect
    // 'fx-push'           push effect
    // 'fx-rotate'         rotate effect
    // 'fx-push-move'      push-move effect
    // 'fx-push-rotate'    push-rotate effect
    'content_fx'    => 'fx-opacity',
    //  Available themes: 'river', 'amethyst' , 'dragon', 'emerald', 'grass' or '' leave empty for the default fresh orange
    'theme'         => '',
    'active_page'   => basename($_SERVER['PHP_SELF'])
);

/* Primary navigation array (the primary navigation will be created automatically based on this array, up to 3 levels deep) */
$primary_nav = array(
    array(
        'name'  => 'Welcome',
        'url'   => 'header'
    ),
    array(
        'name'  => 'Dashboard',
        'url'   => 'index.php',
        'icon'  => 'fa fa-coffee'
    ),
    array(
        'name'  => 'User Interface',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Elements',
        'icon'  => 'fa fa-rocket',
        'sub'   => array(
            array(
                'name'  => 'Typography',
                'url'   => 'page_elements_typography.php'
            ),
            array(
                'name'  => 'Blocks - Grid',
                'url'   => 'page_elements_blocks_grid.php'
            ),
            array(
                'name'  => 'Navigation - Extras',
                'url'   => 'page_elements_navigation_extras.php'
            ),
            array(
                'name'  => 'Buttons - Dropdowns',
                'url'   => 'page_elements_buttons_dropdowns.php'
            ),
            array(
                'name'  => 'Progress - Loading',
                'url'   => 'page_elements_progress_loading.php'
            )
        )
    ),
    array(
        'name'  => 'Tables',
        'icon'  => 'fa fa-th',
        'sub'   => array(
            array(
                'name'  => 'Styles',
                'url'   => 'page_tables_styles.php'
            ),
            array(
                'name'  => 'Datatables',
                'url'   => 'page_tables_datatables.php'
            ),
            array(
                'name'  => 'Editable',
                'url'   => 'page_tables_editable.php'
            )
        )
    ),
    array(
        'name'  => 'Forms',
        'icon'  => 'fa fa-pencil-square-o',
        'sub'   => array(
            array(
                'name'  => 'General',
                'url'   => 'page_forms_general.php'
            ),
            array(
                'name'  => 'Components',
                'url'   => 'page_forms_components.php'
            ),
            array(
                'name'  => 'Validation',
                'url'   => 'page_forms_validation.php'
            ),
            array(
                'name'  => 'Wizard',
                'url'   => 'page_forms_wizard.php'
            )
        )
    ),
    array(
        'name'  => 'Icon Packs',
        'icon'  => 'fa fa-gift',
        'sub'   => array(
            array(
                'name'  => 'Font Awesome',
                'url'   => 'page_icons_fontawesome.php'
            ),
            array(
                'name'  => 'Glyphicons Pro',
                'url'   => 'page_icons_glyphicons_pro.php'
            )
        )
    ),
    array(
        'name'  => 'Extras',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Components',
        'icon'  => 'fa fa-gear',
        'sub'   => array(
            array(
                'name'  => 'Animations',
                'url'   => 'page_comp_animations.php'
            ),
            array(
                'name'  => 'Carousel',
                'url'   => 'page_comp_carousel.php'
            ),
            array(
                'name'  => 'Gallery',
                'url'   => 'page_comp_gallery.php'
            ),
            array(
                'name'  => 'Calendar',
                'url'   => 'page_comp_calendar.php'
            ),
            array(
                'name'  => 'Charts',
                'url'   => 'page_comp_charts.php'
            ),
            array(
                'name'  => 'Syntax Highlighting',
                'url'   => 'page_comp_syntax_highlighting.php'
            ),
            array(
                'name'  => 'Maps',
                'url'   => 'page_comp_maps.php'
            )
        )
    ),
    array(
        'name'  => 'Pages',
        'icon'  => 'fa fa-file',
        'sub'   => array(
            array(
                'name'  => 'Blank',
                'url'   => 'page_ready_blank.php'
            ),
            array(
                'name'  => '404 Error',
                'url'   => 'page_ready_404.php'
            ),
            array(
                'name'  => 'Search Results',
                'url'   => 'page_ready_search_results.php'
            ),
            array(
                'name'  => 'Pricing Tables',
                'url'   => 'page_ready_pricing_tables.php'
            ),
            array(
                'name'  => 'FAQ',
                'url'   => 'page_ready_faq.php'
            ),
            array(
                'name'  => 'Invoice',
                'url'   => 'page_ready_invoice.php'
            ),
            array(
                'name'  => 'Article',
                'url'   => 'page_ready_article.php'
            ),
            array(
                'name'  => 'Forum',
                'url'   => 'page_ready_forum.php'
            )
        )
    ),
    array(
        'name'  => '3 Level Menu',
        'icon'  => 'glyphicon-tint',
        'sub'   => array(
            array(
                'name'  => 'Link 1',
                'url'   => '#'
            ),
            array(
                'name'  => 'Submenu 1',
                'sub'   => array(
                    array(
                        'name'  => 'Link',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Link',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Link',
                        'url'   => '#'
                    )
                )
            ),
            array(
                'name'  => 'Link 2',
                'url'   => '#'
            ),
            array(
                'name'  => 'Submenu 2',
                'sub'   => array(
                    array(
                        'name'  => 'Link',
                        'url'   => '#'
                    ),
                    array(
                        'name'  => 'Link',
                        'url'   => '#'
                    )
                )
            )
        )
    ),
    array(
        'name'  => 'Special',
        'url'   => 'header',
    ),
    array(
        'name'  => 'Timeline',
        'url'   => 'page_special_timeline.php',
        'icon'  => 'fa fa-clock-o'
    ),
    array(
        'name'  => 'User Profile',
        'url'   => 'page_special_user_profile.php',
        'icon'  => 'fa fa-pencil-square'
    ),
    array(
        'name'  => 'Message Center',
        'url'   => 'page_special_message_center.php',
        'icon'  => 'fa fa-envelope-o'
    ),
    array(
        'name'  => 'Login &amp; Register',
        'url'   => 'page_special_login.php',
        'icon'  => 'fa fa-power-off'
    )
);