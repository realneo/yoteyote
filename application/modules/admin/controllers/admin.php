<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Admin	Controller
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

class Admin extends Admin_Controller
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

		modules::run('auth/restrict_user', 'admin');

		//log_message('debug', "Class Name Initialized");
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
			$data['module']     = 'admin';
			$data['view_file']  = "dashboard";

			$this->load->module('template');
			$this->template->admin_fluid_dashboard($data);
		}

		// Display the Auth Login Form
		else
		{
			Modules::run('auth/login');
		}
	}

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: admin.php
 * Location: ./application/modules/admin/controllers/admin.php
 * ------------------------------------------------------------------------
 */