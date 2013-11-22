<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor  : phpDesigner 8.1.2
 * Date    : 10/17/2013
 * Time    : 1:01:10 PM
 * Authors : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Name
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

// ------------------------------------------------------------------------

/**
 * logged_in()
 *
 * Description:
 *
 * @access	public
 * @param	string
 * @return	void
 */
if ( ! function_exists('logged_in'))
{
	function logged_in()
	{
		return (Modules::run('auth/logged_in') === TRUE) ? TRUE : FALSE;
	}
}

// ------------------------------------------------------------------------

/**
 * user_name()
 *
 * Description:
 *
 * @access	public
 * @param	string
 * @return	void
 */
if ( ! function_exists('user_name'))
{
	function user_name()
	{
		$_ci = get_instance();

		return $_ci->session->userdata('user_name');
	}
}

// ------------------------------------------------------------------------

/**
 * user_group()
 *
 * Description:
 *
 * @access	public
 * @param	string
 * @return	void
 */
if ( ! function_exists('user_group'))
{
	function user_group($user_group)
	{
		$_ci = get_instance();

		$auth_group = json_decode($_ci->session->userdata('user_groups'), TRUE);
		//$auth_group = $_ci->session->userdata('user_groups');

		//var_debug($auth_group, $user_group);
		//exit();

		if (in_array($user_group, $auth_group))
		{
			return TRUE;
		}

		return FALSE;
	}
}

/**
 * ------------------------------------------------------------------------
 * End of file auth_helper.php
 * Location: ./application/helpers/auth_helper.php
 * ------------------------------------------------------------------------
 */