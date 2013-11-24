<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Profiles	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	profile
 * @category	category	profile
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Profiles extends Admin_Controller
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

		$this->load->model('mdl_profiles', 'profiles');

		log_message('debug', "Class Name Controller Initialized");
	}

	// -----------------------------------------------------------------------

	/**
	 * index()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function index()
    {

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

		// Setup the record limit and get a total count of all the table records.
		$limit = 10;
		$count = $this->profiles->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('profiles/manage/'),
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
		$query = $this->profiles->get_with_limit($limit, $offset, $order_by);

		// Setup the data array and display the view.
		$data = array(
			'data_grid'   => $query->result(),
			'pager_links' => $this->fx_pagination->create_links(),
			'view_file'   => 'manage',
		);

		$this->load->module('template');
		$this->template->render('admin_fluid_dashboard', $data);
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
		// Edit the users profile record.

    	// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('dob', 'DOB', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('bio', 'BIO', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('street', 'Street', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('building_name', 'Building Name', 'trim|required');
		$this->form_validation->set_rules('building_number', 'Building Number', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('nickname', 'Nickname', 'trim|required|min_length[5]|max_length[12]|callback_nick_name_check');

		// Setup for the module views.
		$data['module']     = 'profiles';
		$data['view_file']  = "edit_form";

		// Run the Form Validation
		if ($this->form_validation->run($this) === FALSE)
		{
			// Show the users profile form
			$this->load->module('template');
			$this->template->render('admin_fluid_dashboard', $data);
		}

		// Update the users Profile record.
		else
		{

			$data = array(
				'first_name' => '',
				'last_name' => '',
				'dob' => '',
				'gender' => '',
				'bio' => '',
				'mobile' => '',
				'bank' => '',
				'pic' => '',
				'country' => '',
				'city' => '',
				'street' => '',
				'building_name' => '',
				'building_number' => '',
				'nickname' => '',
			);

		}

	}


	// --------------------------------------------------------------------

	/**
	 * nick_name_check()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function nick_name_check($str)
	{
		$result = $this->profiles->get_where(array('profile_nickname' => $str));

		if ($result === FALSE)
		{
			$this->form_validation->set_message('nick_name_check', $this->lang->line('nick_name_callback_error'));

			return FALSE;
		}

		return TRUE;
	}

}	// End of Class.

/**
 * *------------------------------------------------------------------------
 * Filename: profile.php
 * Location: ./application/modules/profile/controllers/profile.php
 * ------------------------------------------------------------------------
 */