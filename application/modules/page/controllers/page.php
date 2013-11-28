<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 7:22:51 AM
 * Author: Raymond L King Sr. and Stephen Willis.
 * ------------------------------------------------------------------------
 *
 * Class	Page	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	page
 * @category	category	page
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Page extends Public_Controller
{
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

		//Modules::run('auth/restrict_user', '100');
		//Modules::run('auth/make_sure_is_admin');
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
		$data = array();

		// Grab the URI segment.
		$page_slug = $this->uri->segment(2);

		if ($page_slug === FALSE)
		{
			$page_slug = 'home';
		}

        // Load the page model.
        $this->load->model('page/mdl_pages', 'page');

        $page_data = $this->page->get_where(array('page_slug' => $page_slug));


		if ($page_data === FALSE OR $page_data === NULL)
		{
			// Show a 404 if no page exists.
			show_404();
		}

		// Get the Theme & Menu data from the ui_helper.
		$data = set_page_data($page_slug);

		// Loop through and get the page data.
        foreach ($page_data->result() as $row)
		{
            // page_title - page_headline - page_url - page_keywords - page_description - page_content
           	$data['page_title']       = $row->page_title;
           	$data['page_slug']        = $row->page_slug;
       	    $data['page_headline']    = $row->page_headline;
            $data['page_keywords']    = $row->page_keywords;
   	        $data['page_description'] = $row->page_description;
   	        $data['user_name']        = 'Guest';
           	$data['page_content']     = $row->page_content;
           	$data['page_author']      = $row->page_author;
           	$data['page_created_at']  = $row->page_created_at;
        }

		// Load and display the view.
		$this->load->view($page_slug, $data);
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: page.php
 * Location: ./application/modules/page/controllers/page.php
 * ------------------------------------------------------------------------
 */