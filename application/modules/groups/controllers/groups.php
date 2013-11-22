<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Groups	Controller
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

class Groups extends Auth_Controller
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

		$this->load->model('mdl_groups', 'groups');

		log_message('debug', "Class Name Initialized");
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
		$count = $this->groups->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('groups/manage/'),
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
		$order_by  = 'user_id asc';
		$query = $this->groups->get_with_limit($limit, $offset, $order_by);

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
	 * Add a new user to the database table.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function add()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		$this->form_validation->set_rules('group_id', 'Group ID', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['view_file'] = "add";

			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
		}

		// Add a new page.
		else
		{
			$data = array(
				'user_id'  => set_value('user_id'),
				'group_id' => set_value('group_id'),
			);

			$this->groups->_insert($data);

			redirect('groups/manage');
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
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->form_validation->set_rules('user_id', 'User ID', 'required');
		$this->form_validation->set_rules('group_id', 'Group ID', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->groups->get_where(array('user_id' => $id));
			$row   = $query->row_array();

			// Set the page_status selected value.
			$data = array(
				'user_id'   => $row['user_id'],
				'group_id'  => $row['group_id'],
				'view_file' => "edit",
			);

			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
		}

		// Update the page.
		else
		{
			$now = date("Y-m-d H:i:s");

			$data_record = array(
				'user_id'  => set_value('user_id'),
				'group_id' => set_value('group_id'),
			);

			$this->groups->_update(array('id' => $id), $data_record);

			$data = array(
				'module'    => 'groups',
				'view_file' => 'edit_success',
			);

			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
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
		$this->groups->_delete(array('user_id' => $id));

		$data = array(
			'view_file' => 'delete_success',
		);

		$this->load->module('template');
		$this->template->admin_fluid_dashboard($data);
	}

	// -----------------------------------------------------------------------

	/**
	 * get_user_groups()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function get_user_groups($id)
    {
    	$data     = array();
		$order_by = 'user_id asc';

		$query = $this->groups->get($order_by);

		$index = 0;

		// Loop through and build the users groups.
		foreach ($query->result() as $row)
		{
			if ($row->user_id == $id)
			{
				$index++;
				$group = $row->group_id;

				$data[$index] = $group;
			}
		}

		return $data;

    }

	// -----------------------------------------------------------------------

	/**
	 * insert_user_group()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function insert_user_group($data)
    {
		$result = $this->groups->_insert($data);
    }

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: groups.php
 * Location: ./application/modules/groups/controllers/groups.php
 * ------------------------------------------------------------------------
 */