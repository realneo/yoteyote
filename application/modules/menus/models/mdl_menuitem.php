<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:41:04 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Mdl_menuitem	Model
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	menu
 * @category	category	menuitem
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Mdl_menuitem extends MY_Model
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

		$this->set_table('menu_items');
	}

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: mdl_menuitem.php
 * Location: ./application/modules/menuitem/models/mdl_menuitem.php
 * ------------------------------------------------------------------------
 */