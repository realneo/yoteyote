<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Group	Controller
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

class Group extends Admin_Controller
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

		$this->load->model('mdl_group', 'group');

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
		$count = $this->group->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('group/manage/'),
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
		$query = $this->group->get_with_limit($limit, $offset, $order_by);

		// Setup the data array and display the view.
		$data = array(
			'data_grid'   => $query->result(),
			'pager_links' => $this->fx_pagination->create_links(),
			'view_file'   => 'manage',
		);

		$this->load->module('template');
		$this->template->admin_dashboard($data);
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

		$this->form_validation->set_rules('group_name', 'Group Name', 'required');
		$this->form_validation->set_rules('group_description', 'Group Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$data['view_file'] = "add";

			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}

		// Add a new page.
		else
		{
			$now = date("Y-m-d H:i:s");

			$data = array(
				'name'              => set_value('group_name'),
				'group_description' => set_value('group_description'),
			);

			$this->group->_insert($data);

			redirect('group/manage');
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

		$this->form_validation->set_rules('group_name', 'Group Name', 'required');
		$this->form_validation->set_rules('group_description', 'Group Description', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->group->get_where(array('id' => $id));
			$row   = $query->row_array();

			// Set the page_status selected value.
			$data = array(
				'group_name'        => $row['name'],
				'group_description' => $row['description'],
				'view_file'         => "edit",
			);

			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}

		// Update the page.
		else
		{
			$now = date("Y-m-d H:i:s");

			$data_record = array(
				'name'        => set_value('group_name'),
				'description' => set_value('group_description'),
			);

			$this->group->_update(array('id' => $id), $data_record);

			$data = array(
				'module'    => 'group',
				'view_file' => 'edit_success',
			);

			$this->load->module('template');
			$this->template->admin_dashboard($data);
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
		$this->group->_delete(array('id' => $id));

		$data = array(
			'view_file' => 'delete_success',
		);

		$this->load->module('template');
		$this->template->admin_dashboard($data);
	}

	// -----------------------------------------------------------------------

	/**
	 * get_groups()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function get_groups()
    {
    	$data     = array();
    	$order_by = 'id asc';

		$query = $this->group->get($order_by);

		// Loop through and build the groups.
		foreach ($query->result() as $row)
		{
			$id   = $row->id;
			$name = $row->name;

			$data[$id] = $name;
		}

		return $data;

    }

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: group.php
 * Location: ./application/modules/group/controllers/group.php
 * ------------------------------------------------------------------------
 */