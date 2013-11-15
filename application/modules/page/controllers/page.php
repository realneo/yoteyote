<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 7:22:51 AM
 * Author: Raymond L King Sr. and Stephen Willis.
 * ------------------------------------------------------------------------
 *
 * Class	Custompage
 *
 * ------------------------------------------------------------------------
 * @package		Package		Name
 * @subpackage	Subpackage	name
 * @category	category	name
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
		$page_url = $this->uri->segment(2);

		if ($page_url === FALSE)
		{
			$page_url = 'home';
		}

        // Load the page model.
        $this->load->model('pages/mdl_pages', 'pages');

        $page_data = $this->pages->get_where(array('page_url' => $page_url));

		if ($page_data === FALSE)
		{
			// Show a 404 if no page exists.
			show_404();
		}

		// Loop through and get the page data.
        foreach ($page_data->result() as $row)
		{
            // page_title - page_headline - page_url - page_keywords - page_description - page_content
           	$data['page_title']       = $row->page_title;
       	    $data['page_headline']    = $row->page_headline;
       	    $data['page_url']         = $row->page_url;
            $data['page_keywords']    = $row->page_keywords;
   	        $data['page_description'] = $row->page_description;
           	$data['page_content']     = $row->page_content;
           	$data['page_author']      = $row->page_author;
           	$data['page_created_at']  = $row->page_created_at;
        }

		/**
		 * ----------------------------------------------------------------------
		 * Page Template View
		 * ----------------------------------------------------------------------
		 *
		 * These have to match the page methods in the template controller.
		 *
		 * public_fluid_one       -
		 * public_fluid_three     -
		 * public_fluid_two_left  -
		 * public_fluid_two_right -
		 *
		 * public_one       -
		 * public_three     -
		 * public_two_left  -
		 * public_two_right -
		 *
		 */
	    $this->load->module('template');
    	$this->template->public_fluid_two_left($data);
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * End of file custompage.php
 * Location: ./application/modules/custompage/controllers/custompage.php
 * ------------------------------------------------------------------------
 */