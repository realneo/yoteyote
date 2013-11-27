<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Menu	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	menu
 * @category	category	menu
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Menu extends Auth_Controller
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

		// Load the Menu models.
		$this->load->model('mdl_menu');
		$this->load->model('mdl_menuitem');

		$this->load->libaray('lib_menu');

		log_message('debug', "Class Menu Controller Initialized");
	}

	// -----------------------------------------------------------------------

	/**
	 * manage_menu()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function manage_menu()
    {

    }

	// -----------------------------------------------------------------------

	/**
	 * manage_menuitem()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function manage_menuitem()
    {

    }

	// -----------------------------------------------------------------------

	/**
	 * menu_run()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function menu_run()
    {

    }

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: menu.php
 * Location: ./application/modules/menu/controllers/menu.php
 * ------------------------------------------------------------------------
 */