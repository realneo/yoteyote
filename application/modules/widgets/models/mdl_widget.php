<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:41:04 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Mdl_widget	Model
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	widget
 * @category	category	widget
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Mdl_perfectmodel extends CI_Model
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

		$this->set_table('');
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: mdl_widget.php
 * Location: ./application/widget/models/mdl_widget.php
 * ------------------------------------------------------------------------
 */