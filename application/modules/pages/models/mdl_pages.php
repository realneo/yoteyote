<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 8:22:55 AM
 * Author: Raymond L King Sr. and Stephen Willis.
 * ------------------------------------------------------------------------
 *
 * Class	Mdl_pages
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	pages
 * @category	category	pages
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Mdl_pages extends MY_Model
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

		$this->set_table('pages');
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: mdl_pages.php
 * Location: ./application/modules/pages/model/mdl_pages.php
 * ------------------------------------------------------------------------
 */