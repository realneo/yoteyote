<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// load the HMVC - MX_Controller Class.
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

/**
 * ------------------------------------------------------------------------
 * HMVC Modules:
 * ------------------------------------------------------------------------
 *
 * The Modules::$locations array may be set in the application/config.php
 * file. ie:
 *
 * <?php
 * $config['modules_locations'] = array(
 * 		APPPATH.'modules/' => '../modules/',
 * );
 *
 * ------------------------------------------------------------------------
 *
 * Controllers can be loaded as class variables of other controllers using
 *
 * $this->load->module('module/controller'); or simply
 * $this->load->module('module');
 *
 * if the controller name matches the module name.
 * Any loaded module controller can then be used like a library, ie:
 * $this->controller->method(),
 * but it has access to its own models and libraries independently from the
 * caller.
 *
 * All module controllers are accessible from the URL
 * via module/controller/method or simply module/method
 * if the module and controller names match.
 *
 * If you add the _remap() method to your controllers you can prevent unwanted
 * access to them from the URL and redirect or flag an error as you like.
 *
 * module::run - For loading view partials ( widgets ).
 *
 * ------------------------------------------------------------------------
 *
 * View Partials
 *
 * Using a Module as a view partial from within a view is as easy as writing:
 * <?php echo Modules::run('module/controller/method', $param, $...); ?>
 *
 * module and controller names are different, you must include the method
 * name also, including 'index'
 * modules::run('module/controller/method', $params, $...);
 *
 * module and controller names are the same but the method is not 'index'
 * modules::run('module/method', $params, $...);
 *
 * module and controller names are the same and the method is 'index'
 * modules::run('module', $params, $...);
 *
 * Parameters are optional, You may pass any number of parameters.
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
		$this->load->module('profiles');
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