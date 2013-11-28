<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 7:51:37 AM
 * Author: Raymond L King Sr. and Stephen Willis.
 * ------------------------------------------------------------------------
 *
 * Class	Name
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

class Mdl_users extends MY_Model
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

		$this->set_table('users');
	}

	// -----------------------------------------------------------------------

	/**
	 * verify_user_details()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function verify_user_details($auth_type, $user_name)
    {
		$this->db->where($auth_type, $user_name);
		return $query = $this->db->get($this->table);
    }

	// -----------------------------------------------------------------------

	/**
	 * password_check()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function password_check($user_name, $user_password)
	{
		$this->db->where('user_name', $user_name);
		$this->db->where('user_password', $user_password);

		$query = $this->db->get($this->table);

		return ($query->num_rows() == 1) ? TRUE : FALSE;
	}

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: Mdl_users.php
 * Location: ./application/modules/users/models/mdl_users.php
 * ------------------------------------------------------------------------
 */