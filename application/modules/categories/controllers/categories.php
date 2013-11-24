<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Categories	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	categories
 * @category	category	categories
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

		$this->load->model('mdl_category', 'category');

		log_message('debug', "Class Name Controller Initialized");
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
		$count = $this->categories->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('categories/manage/'),
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
		$query = $this->categories->get_with_limit($limit, $offset, $order_by);

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

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('category_short_desc', 'Category Short Desc', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('category_long_desc', 'Category Long Desc', 'trim|required');
		$this->form_validation->set_rules('category_sort_order', 'Category Sort Order', 'trim|required|min_length[1]|max_length[3]');
		$this->form_validation->set_rules('category_parent_id', 'Category Parent ID', 'trim|required');
		$this->form_validation->set_rules('category_status', 'Category Status', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'view_file' => 'add',
			);

			$this->load->module('template');
			$this->template->render('admin_fluid_dashboard', $data);
		}

		// Add a new page.
		else
		{
			$data = array(
				'category_name'       => '',
				'category_short_desc' => '',
				'category_long_desc'  => '',
				'category_sort_order' => '',
				'category_parent_id'  => '',
				'category_created_at' => set_now(),
				'category_updated_at' => set_now(),
				'category_status'     => '',
			);

			$this->categories->_insert($data);

			redirect('categories/manage');
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
		// Edit the users profile record.

    	// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('category_short_desc', 'Category Short Desc', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('category_long_desc', 'Category Long Desc', 'trim|required');
		$this->form_validation->set_rules('category_sort_order', 'Category Sort Order', 'trim|required|min_length[1]|max_length[3]');
		$this->form_validation->set_rules('category_parent_id', 'Category Parent ID', 'trim|required');
		$this->form_validation->set_rules('category_status', 'Category Status', 'trim|required');

		// Run the Form Validation
		if ($this->form_validation->run($this) === FALSE)
		{
			$query = $this->categories->get_where(array('id' => $id));
			$row   = $query->row_array();

			// Setup for the module views.
			$data = array(
				'module'    => 'categories',
				'view_file' => "edit_form",
			);

			// Show the users profile form
			$this->load->module('template');
			$this->template->render('admin_fluid_dashboard', $data);
		}

		// Update the users Profile record.
		else
		{
			$data_record = array(
				'category_name'       => '',
				'category_short_desc' => '',
				'category_long_desc'  => '',
				'category_sort_order' => '',
				'category_parent_id'  => '',
				'category_updated_at' => set_now(),
				'category_status'     => '',
			);

			$this->categories->_update(array('id' => $id), $data_record);

			$data = array(
				'module'    => 'categories',
				'view_file' => 'edit_success',
			);

			$this->load->module('template');
			$this->template->render('admin_fluid_dashboard', $data);
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
		$this->categories->_delete(array('id' => $id));

		$data = array(
			'view_file' => 'delete_success',
		);

		$this->load->module('template');
		$this->template->render('admin_fluid_dashboard', $data);
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: categories.php
 * Location: ./application/modules/categories/controllers/categories.php
 * ------------------------------------------------------------------------
 */