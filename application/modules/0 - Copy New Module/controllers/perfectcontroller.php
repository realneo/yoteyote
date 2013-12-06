<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Name	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	name
 * @category	category	name
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Perfectcontroller extends Auth_Controller
{
	/**
	 * -----------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * -----------------------------------------------------------------------
	 */


	// -----------------------------------------------------------------------

	/**
	 * __construct()
	 *
	 * Constructor	PHP 5+
	 *
	 * NOTE: Not needed if not setting values or extending a Class.
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('mdl_perfectmodel', '');

		log_message('debug', "Class Name Controller Initialized");
	}

	// --------------------------------------------------------------------

	/**
	 * manage()
	 *
	 * Manage the user database records.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function manage($offset = '')
	{
		// Load the fx_pagination library.
		$this->load->library('fx_pagination');

		// Setup the record limit and get a total count of all table records.
		$limit = 10;
		$count = $this->comment->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('comments/manage/'),
			'uri_segment'   => 3,
			'full_tag_open' => '<div id"content" class="text-center"><ul class="pagination pagination-sm page-manage">',
			'display_pages' => TRUE,
			'per_page'      => $limit,
			'total_rows'    => $count,
			'num_links'     => 4,
			'show_count'    => TRUE,
		);

		// Initialize the fx_pagination configuration.
		$this->fx_pagination->initialize($config);

		// Get the database records with limit and offset.
		$order_by  = 'id asc';
		$query = $this->comment->get_with_limit($limit, $offset, $order_by);

		// Setup the data array and display the view.
		$data = $this->set_admin_data('dashboard');

		$data['page_title']  = 'Manage Comments';
		$data['data_grid']   = $query->result();
		$data['pager_links'] = $this->fx_pagination->create_links();
		$data['view_file']   = 'comment_manage';

		$this->load->view('comment', $data);
	}

	// --------------------------------------------------------------------

	/**
	 * add()
	 *
	 * Add a new user to the database table.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function add()
	{
		// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		/**
		 * ----------------------------------------------------------------------
		 * Setup the Form Validation Rules.
		 * You must supply at least one form validation rule to use CI forms and
		 * jQuery validation!
		 * ----------------------------------------------------------------------
		 */
		$this->form_validation->set_rules('comment_user_name', 'Comment Name', 'trim|required|min_length[4]');

		// Run the form.
		if ($this->form_validation->run($this) == FALSE)
		{
			$data = $this->set_admin_data('add');

			$data['page_title'] = 'Add Comment';
			$data['module']     = 'comments';
			$data['view_file']  = "comment_add";

			$this->load->view('comment', $data);
		}

		// Form Validation passed so add the user to the database.
		else
		{
			// See if the forms have been submitted!
			$submit = $this->input->post(NULL, TRUE);

			// Has the form been submitted ( name"add" )?
			if (isset($submit['add']))
			{
				$comment_user_name = set_value($this->session->userdata('user_name'));

				// Setup the database record data.
				$data = array(
					'comment_user_name'  => $comment_user_name,
					'comment_email'      => $this->input->post('comment_email', TRUE),
					'comment_post_id'    => $this->input->post('comment_post_id', TRUE),
					'comment_content'    => $this->input->post('comment_content', TRUE),
					'comment_created_at' => set_now(),
					'comment_updated_at' => set_now(),
					'comment_status'     => $this->input->post('comment_status', TRUE),
				);

				// Insert the new page database record.
				$insert_id = $this->comment->_insert($data);

				$data2['msg'] = "The comment has now been created.";

				redirect('comments/manage', 'refresh');
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * edit()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function edit($id)
	{
		// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		/**
		 * ----------------------------------------------------------------------
		 * Setup the Form Validation Rules.
		 * You must supply at least one form validation rule to use CI forms and
		 * jQuery validation!
		 * ----------------------------------------------------------------------
		 */
		$this->form_validation->set_rules('comment_user_name', 'Commnet Name', 'trim|required|min_length[4]');

		// Run the form.
		if ($this->form_validation->run($this) == FALSE)
		{
			$data = $this->set_admin_data('edit');

			// Get the users information.
			$query = $this->comment->get_where(array('id' => $id));
			$row   = $query->row();

			// Setup the view with the database record data.
			$data['comment_user_name']  = $row->comment_user_name;
			$data['comment_email']      = $row->comment_email;
			$data['comment_post_id']    = $row->comment_post_id;
			$data['comment_content']    = $row->comment_content;
			$data['comment_status']     = $row->comment_status;

			$data['page_title'] = 'Edit Comment';
			$data['module']     = 'comments';
			$data['view_file']  = "comment_edit";

			$this->load->view('comment', $data);
		}

		// Form Validation passed so update the pages database record.
		else
		{
			// See if the forms have been submitted ( name"update" )!
			$submit = $this->input->post(NULL, TRUE);

			// Has the form been submitted?
			if (isset($submit['update']))
			{
				$comment_user_name = set_value($this->session->userdata('user_name'));

				// Setup the database record data.
				$data = array(
					'comment_user_name'  => $comment_user_name,
					'comment_email'      => $this->input->post('comment_email', TRUE),
					'comment_post_id'    => $this->input->post('comment_post_id', TRUE),
					'comment_content'    => $this->input->post('comment_content', TRUE),
					'comment_updated_at' => set_now(),
					'comment_status'     => $this->input->post('comment_status', TRUE),
				);

				$result = $this->pages->_update(array('id' => $id), $data);

				$data2['msg'] = "The comment has now been edited.";

				redirect('comments/manage', 'refresh');
			}
		}
	}

	// --------------------------------------------------------------------

	/**
	 * delete()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function delete($id)
	{
		$this->comment->_delete(array('id' => $id));

		/**
		 * ----------------------------------------------------------------------
		 * You can add Success messages etc; Here if you want.
		 * ----------------------------------------------------------------------
		 */

		redirect('comments/manage', 'refresh');
	}

	// ------------------------------------------------------------------------

	/**
	 * set_admin_data()
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	public function set_admin_data($page)
    {
    	/**
    	 * -------------------------------------------------------------------
		 * The FreshUI Main Configuration data array.
		 * -------------------------------------------------------------------
		 */

		$data = array(
			'template' => array(
    			'name'          => 'Yoteyote',
			    'version'       => '1.0',
			    'author'        => 'Yoteyote',
			    'title'         => 'YoteyoteUI - Premium Web App and Admin Template',
			    'description'   => 'YoteyoteUI is a Premium Web App and Admin Template.',
				'keywords'      => 'Yoteyote',

			    // ''               empty to remove full width from the page (< 992px: 100%, > 992px: 95%, 1440px max width)
			    // 'full-width'     for a full width page (100%, 1920px max width)
			    'page'          => 'full-width',

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
			    'theme'         => 'dragon',
			    //'theme'         => $this->input->cookie('theme_cookie', TRUE),

			    //'active_page'   => basename($_SERVER['PHP_SELF']),
			    'active_page'   => current_url($page),	// To get the CI current page.
			),
		);

		// ----------------------------------------------------------------------

		/**
		 * ----------------------------------------------------------------------
		 * This data is for the Main navigation menus.
		 * ----------------------------------------------------------------------
		 */

		$data['primary_nav'] = array(
		    array(
        		'name'  => 'Welcome',
		        'url'   => 'header'
		    ),
		    array(
        		'name'  => (user_group('admin')) ? 'Dashboard' : 'Home',
		        'url'   => (user_group('admin')) ? base_url('dashboard') : base_url('/'),
        		'icon'  => 'fa fa-coffee'
		    ),
		    array(
        		'name'  => 'Manage',
		        'url'   => 'header',
		    ),
		    array(
        		'name'  => 'Users',
		        'icon'  => 'fa fa-th',
        		'sub'   => array(
		            array(
    		            'name'  => 'Users',
        		        'url'   => base_url('users/manage'),
            		),
		        )
    		),
		    array(
	        	'name'  => 'Pages',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Pages',
		                'url'   => base_url('pages/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Posts',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Posts',
		                'url'   => base_url('posts/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Comments',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Comments',
		                'url'   => base_url('comments/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Group',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Group',
		                'url'   => base_url('group/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Groups',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Groups',
		                'url'   => base_url('groups/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'I Want',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'I Want',
		                'url'   => base_url('iwant/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'I Will',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'I Will',
		                'url'   => base_url('iwill/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Logs',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Logs',
		                'url'   => base_url('logs/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Menus',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Menus',
		                'url'   => base_url('menus/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Profiles',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Profiles',
		                'url'   => base_url('profiles/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Settings',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Settings',
		                'url'   => base_url('settings/manage'),
        		    ),
		        )
		    ),
		    array(
	        	'name'  => 'Widgets',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Widgets',
		                'url'   => base_url('widgets/manage'),
        		    ),
		        )
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
        		        'url'   => base_url('home/page_elements_typography'),
            		),
	            	array(
    	            	'name'  => 'Blocks - Grid',
	        	        'url'   => base_url('home/page_elements_blocks_grid'),
    	        	),
	    	        array(
    	    	        'name'  => 'Navigation - Extras',
        	    	    'url'   => base_url('home/page_elements_navigation_extras'),
	            	),
		            array(
    		            'name'  => 'Buttons - Dropdowns',
        		        'url'   => base_url('home/page_elements_buttons_dropdowns'),
            		),
		            array(
    		            'name'  => 'Progress - Loading',
        		        'url'   => base_url('home/page_elements_progress_loading'),
            		)
		        )
    		),
		    array(
	        	'name'  => 'Tables',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Styles',
		                'url'   => base_url('home/page_tables_styles'),
        		    ),
		            array(
        		        'name'  => 'Datatables',
                		'url'   => base_url('home/page_tables_datatables'),
		            ),
        		    array(
                		'name'  => 'Editable',
		                'url'   => base_url('home/page_tables_editable'),
        		    )
		        )
		    ),
		    array(
        		'name'  => 'Forms',
		        'icon'  => 'fa fa-pencil-square-o',
        		'sub'   => array(
		            array(
        		        'name'  => 'General',
		                'url'   => base_url('home/page_forms_general'),
        		    ),
		            array(
        		        'name'  => 'Components',
                		'url'   => base_url('home/page_forms_components'),
		            ),
        		    array(
                		'name'  => 'Validation',
		                'url'   => base_url('home/page_forms_validation'),
        		    ),
		            array(
        		        'name'  => 'Wizard',
                		'url'   => base_url('home/page_forms_wizard'),
		            )
        		)
		    ),
		    array(
        		'name'  => 'Icon Packs',
		        'icon'  => 'fa fa-gift',
        		'sub'   => array(
		            array(
        		        'name'  => 'Font Awesome',
                		'url'   => base_url('home/page_icons_fontawesome'),
		            ),
        		    array(
                		'name'  => 'Glyphicons Pro',
		                'url'   => base_url('home/page_icons_glyphicons_pro'),
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
		                'url'   => base_url('home/page_comp_animations'),
        		    ),
		            array(
        		        'name'  => 'Carousel',
                		'url'   => base_url('home/page_comp_carousel'),
		            ),
        		    array(
                		'name'  => 'Gallery',
		                'url'   => base_url('home/page_comp_gallery'),
        		    ),
		            array(
        		        'name'  => 'Calendar',
                		'url'   => base_url('home/page_comp_calendar'),
		            ),
        		    array(
                		'name'  => 'Charts',
		                'url'   => base_url('home/page_comp_charts'),
        		    ),
		            array(
        		        'name'  => 'Syntax Highlighting',
                		'url'   => base_url('home/page_comp_syntax_highlighting'),
		            ),
        		    array(
                		'name'  => 'Maps',
		                'url'   => base_url('home/page_comp_maps'),
        		    )
		        )
		    ),
		    array(
        		'name'  => 'Pages',
		        'icon'  => 'fa fa-file',
        		'sub'   => array(
		            array(
        		        'name'  => 'Blank',
                		'url'   => base_url('home/page_ready_blank'),
		            ),
        		    array(
                		'name'  => '404 Error',
		                'url'   => base_url('home/page_ready_404'),
        		    ),
		            array(
        		        'name'  => 'Search Results',
                		'url'   => base_url('home/page_ready_search_results'),
		            ),
        		    array(
                		'name'  => 'Pricing Tables',
		                'url'   => base_url('home/page_ready_pricing_tables'),
        		    ),
		            array(
        		        'name'  => 'FAQ',
                		'url'   => base_url('home/page_ready_faq'),
		            ),
        		    array(
                		'name'  => 'Invoice',
		                'url'   => base_url('home/page_ready_invoice'),
        		    ),
		            array(
        		        'name'  => 'Article',
                		'url'   => base_url('home/page_ready_article'),
		            ),
        		    array(
                		'name'  => 'Forum',
		                'url'   => base_url('home/page_ready_forum'),
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
		        'url'   => base_url('home/page_special_timeline'),
        		'icon'  => 'fa fa-clock-o'
		    ),
		    array(
        		'name'  => 'User Profile',
		        'url'   => base_url('home/page_special_user_profile'),
        		'icon'  => 'fa fa-pencil-square'
		    ),
		    array(
        		'name'  => 'Message Center',
		        'url'   => base_url('home/page_special_message_center'),
		        'icon'  => 'fa fa-envelope-o'
		    ),
		    array(
        		'name'  => 'Yoteyote Page',
		        'url'   => base_url('home/page_ready_yoteyote_blank'),
		        'icon'  => 'fa fa-envelope-o'
		    ),
		    array(
        		'name'  => 'Login &amp; Register',
		        //'url'   => base_url('home/page_special_login'),
		        'url'   => base_url('login'),
        		'icon'  => 'fa fa-power-off'
		    )
		);

		return $data;
    }

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: filename.php
 * Location: ./application/modules/module_dir/controllers/filename.php
 * ------------------------------------------------------------------------
 */