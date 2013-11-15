<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// load the MX_Controller class
require APPPATH.'third_party/MX/Controller.php';

/**
 * ------------------------------------------------------------------------
 * Editor  : phpDesigner 8.1.2
 * Date    : 10/17/2013
 * Time    : 9:07:10 AM
 * Authors : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	MY_Controller
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Base_Controller extends MX_Controller {

	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */


 	// --------------------------------------------------------------------

	/**
	 *  __construct
	 *
	 * Class Constructor	PHP 5+
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

		// use profiler
		$this->output->enable_profiler(PROFILER);

		$this->load->module('users');
	}

	// --------------------------------------------------------------------

	/**
	 * login()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function login()
	{
		$this->login();
	}

	// --------------------------------------------------------------------

	/**
	 * logout()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function logout()
	{
		$this->logout();
	}

	// --------------------------------------------------------------------

	/**
	 * register()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function register()
	{
		$this->register();
	}

}	// End of Class.


// ------------------------------------------------------------------------

/**
 * Auth_Controller
 */
class Auth_Controller extends Base_Controller
{
	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */


 	// --------------------------------------------------------------------

	/**
	 *  __construct()
	 *
	 * Class Constructor	PHP 5+
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();


	}



}	// End of Class.


// ------------------------------------------------------------------------

/**
 * Admin_Controller
 */
class Admin_Controller extends Base_Controller
{
	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */


 	// --------------------------------------------------------------------

	/**
	 *  __construct()
	 *
	 * Class Constructor	PHP 5+
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

	}


}	// End of Class.


// ------------------------------------------------------------------------

/**
 * Public_Controller
 */
class Public_Controller extends Base_Controller
{
	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */


 	// --------------------------------------------------------------------

	/**
	 *  __construct()
	 *
	 * Class Constructor	PHP 5+
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		parent::__construct();

	}


}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * End of file Base_Controller.php
 * Location: ./application/core/MY_Controller.php
 * ------------------------------------------------------------------------
 */