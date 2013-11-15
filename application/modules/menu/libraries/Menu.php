<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor  : phpDesigner 8.1.2
 * Date    : 10/27/2013
 * Time    : 9:40:38 AM
 * Authors : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Menu	Library
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Menu
{
	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */

	private $_ci;


	private $dropdown_open  = '<li class="dropdown">';
	private $dropdown_close = '</li>';

	private $dropdown_menu_open  = '';
	private $dropdown_menu_close = '';

	private $dropdown_divider = '<li class="divider"></li>';





	// --------------------------------------------------------------------

	/**
	 * __construct()
	 *
	 * Class	Constuctor PHP 5+
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		$this->_ci = get_instance();

		log_message('debug', "Class Menu Library Initialized");
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * End of file Menu.php
 * Location: ./application/modules/menu/libraries/Menu.php
 * ------------------------------------------------------------------------
 */