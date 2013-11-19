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
		$this->template->user_dashboard($data);
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

/*
  `id`                      int(11)      unsigned NOT NULL  AUTO_INCREMENT,  -- The profile record id
  `profile_user_id`         int(11)      unsigned NOT NULL,                  -- The profile users id
  `profile_first_name`      varchar(45)                     DEFAULT NULL,    -- The profile users first name
  `profile_last_name`       varchar(45)                     DEFAULT NULL,    -- The profile users last name
  `profile_dob`             date                            DEFAULT '0000-00-00',  -- The profile users date of birth
  `profile_gender`          varchar(6)                      DEFAULT NULL,    -- The profile users gender
  `profile_bio`             text,                                            -- The profile users bio
  `profile_mobile`          varchar(15)                     DEFAULT NULL,    -- The profile users mobile phone number
  `profile_bank`            int(11)      unsigned NOT NULL  DEFAULT '0',     -- The profile users bank
  `profile_pic`             varchar(255)                    DEFAULT NULL,    -- The profile users pic
  `profile_country`         varchar(255)                    DEFAULT NULL,    -- The profile users country
  `profile_city`            varchar(100)                    DEFAULT NULL,    -- The profile users city
  `profile_street`          varchar(100)                    DEFAULT NULL,    -- The profile users street address
  `profile_building_name`   varchar(255)                    DEFAULT NULL,    -- The profile users building name
  `profile_building_number` varchar(255)                    DEFAULT NULL,    -- The profile users building number
  `profile_nickname`        varchar(255)                    DEFAULT NULL,    -- The profile users nick name
  `profile_created_at`      datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The profile created at date time
  `profile_updated_at`      datetime              NOT NULL  DEFAULT '0000-00-00 00:00:00',  -- The profile updated at date time
*/
		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('last_name', 'User Password', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('dob', 'DOB', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('bio', 'BIO', 'trim|required|min_length[5]|max_length[40]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('bank', 'Bank', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('pic', 'Pic', 'trim|required');
		$this->form_validation->set_rules('country', 'Contry', 'trim|required|min_length[5]|max_length[40]');
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
			// Show the normal registration form
			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
		}

		// Update the users Profile record.
		else
		{


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