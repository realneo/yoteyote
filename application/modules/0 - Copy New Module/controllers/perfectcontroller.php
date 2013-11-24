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
		$count = $this->perfectcontroller->count_all();

		/**
		 * ----------------------------------------------------------------------
		 * FX Pagination Configuration.
		 * ----------------------------------------------------------------------
		 * The base_url and segment below must be set to the correct URL and the
		 * segment must be set to the correct segment number or it WILL NOT WORK!
		 * ----------------------------------------------------------------------
		 */
		$config = array(
			'base_url'      => base_url('perfectcontroller/manage/'),
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
		$query = $this->perfectcontroller->get_with_limit($limit, $offset, $order_by);

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

		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		$this->form_validation->set_rules('page_keywords', 'Meta Keywords', 'required');
		$this->form_validation->set_rules('page_description', 'Meta Description', 'required');
		$this->form_validation->set_rules('page_status', 'Page Status', 'required');
		$this->form_validation->set_rules('page_content', 'Page Content', 'required');

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
				'page_title'       => set_value('page_title'),
				'page_slug'        => url_title(set_value('page_title'), 'underscore', TRUE),
				'page_keywords'    => set_value('page_keywords'),
				'page_description' => set_value('page_description'),
				'page_created_at'  => set_now(),
				'page_updated_at'  => set_now(),
				'page_status'      => set_value('page_status'),
				'page_content'     => set_value('page_content'),
			);

			$this->perfectcontroller->_insert($data);

			redirect('perfectcontroller/manage');
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

		$this->form_validation->set_rules('page_title', 'Page Title', 'required');
		$this->form_validation->set_rules('page_keywords', 'Meta Keywords', 'required');
		$this->form_validation->set_rules('page_description', 'Meta Description', 'required');
		$this->form_validation->set_rules('page_status', 'Page Status', 'required');
		$this->form_validation->set_rules('page_content', 'Page Content', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$query = $this->perfectcontroller->get_where(array('id' => $id));
			$row   = $query->row_array();

			// Set the page_status selected value.
			$data = array(
				'page_title'       => $row['page_title'],
				'page_slug'        => $row['page_slug'],
				'page_keywords'    => $row['page_keywords'],
				'page_description' => $row['page_description'],
				'page_status'      => $row['page_status'],
				'page_content'     => $row['page_content'],
				'selected_one'     => ($row['page_status'] == 'published') ? TRUE : FALSE,
				'selected_two'     => ($row['page_status'] == 'draft') ? TRUE : FALSE,
				'view_file'        => "edit",
			);

			$this->load->module('template');
			$this->template->render('admin_fluid_dashboard', $data);
		}

		// Update the page.
		else
		{
			$data_record = array(
				'page_title'       => set_value('page_title'),
				'page_slug'        => url_title(set_value('page_title'), 'underscore', TRUE),
				'page_keywords'    => set_value('page_keywords'),
				'page_description' => set_value('page_description'),
				'page_updated_at'  => set_now(),
				'page_status'      => set_value('page_status'),
				'page_content'     => set_value('page_content'),
			);

			$this->perfectcontroller->_update(array('id' => $id), $data_record);

			$data = array(
				'module'    => 'module_name',
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
		$this->perfectcontroller->_delete(array('id' => $id));

		$data = array(
			'view_file' => 'delete_success',
		);

		$this->load->module('template');
		$this->template->render('admin_fluid_dashboard', $data);
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: filename.php
 * Location: ./application/modules/module_dir/controllers/filename.php
 * ------------------------------------------------------------------------
 */