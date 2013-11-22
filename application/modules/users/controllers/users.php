<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 7:40:59 AM
 * Author: Raymond L King Sr. and Stephen Willis.
 * ------------------------------------------------------------------------
 *
 * Class	Users	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	auth
 * @category	category	auth
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Users extends Admin_Controller
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

		// Restrict user in this controller to admins and owner only!
		//$this->auth->restrict_user('admin');

		$this->load->model('mdl_users', 'users');
	}

	// --------------------------------------------------------------------

	/**
	 * index()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function index()
	{
		/**
		 * Logged_in.
		 *
		 * If the site owner or admin is logged in then it
		 * will display the Admin Dashboard which uses the
		 * restrict_user method.
		 */
		if (logged_in())
		{
			$data['page_title'] = '';
			$data['module']     = 'users';
			$data['view_file']  = "admin_fluid_dashboard";

			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
		}

		// Not logged in so display the Auth Login Form
		else
		{
			Modules::run('auth/login');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * manage()
	 *
	 * Manages the users.
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
		$count = $this->users->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('users/manage/'),
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
		$query = $this->users->get_with_limit($limit, $offset, $order_by);

		// Setup the data array and display the view.
		$data = array(
			'data_grid'   => $query->result(),
			'pager_links' => $this->fx_pagination->create_links(),
			'view_file'   => 'manage',
		);

		$this->load->module('template');
		$this->template->admin_fluid_dashboard($data);
	}

	// --------------------------------------------------------------------

	/**
	 * add()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function add()
	{
		$this->load->module('auth');
		$this->auth->add_user();
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
		$this->load->module('auth');
		$this->auth->edit_user($id);
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
		$this->users->_delete(array('id' => $id));

		$data = array(
			'module'     => 'users',
			'view_file'  => 'delete_success',
		);

		$this->load->module('template');
		$this->template->admin_dashboard($data);
	}

	// -----------------------------------------------------------------------

	/**
	 * change_password()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function change_password($id, $new_password)
    {

    }

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: users.php
 * Location: ./application/modules/users/controllers/users.php
 * ------------------------------------------------------------------------
 */