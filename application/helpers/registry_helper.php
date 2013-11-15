<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by Php Designer 8.
 * Date  : 5/20/2013
 * Time  : 11:29:08 AM
 * Author: Raymond L King Sr.
 * The Learn CodeIgniter Development Team.
 *
 * Helper registry_helper
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

// ------------------------------------------------------------------------

/**
 * reg_set()
 *
 * Sets a new property.
 *
 * Usage: reg_set($index, $key, $val);
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_set'))
{
	function reg_set($index = '', $key = '', $val = '')
	{
        $_ci = get_instance();
		$_ci->registry->set($index, $key, $val);
	}
}

// ------------------------------------------------------------------------

/**
 * reg_get()
 *
 * Gets a registry value.
 *
 * Usage: $result = reg_get($index, $key);
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_get'))
{
	function reg_get($index = '', $key = '')
	{
        $_ci = get_instance();
		return $_ci->registry->get($index, $key);
	}
}

// ------------------------------------------------------------------------

/**
 * reg_get_index()
 *
 * Get a registry index.
 *
 * Usage: $result = reg_get_index($index);
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_get_index'))
{
	function reg_get_index($index = NULL)
	{
        $_ci = get_instance();
		return $_ci->registry->get_index($index);
	}
}

// ------------------------------------------------------------------------

/**
 * reg_exists()
 *
 * Checks to see if a registry index and key exists.
 *
 * Usage: $result = reg_exists($index, $key);
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_exists'))
{
	function reg_exists($index = '', $key = '')
	{
        $_ci = get_instance();
		return $_ci->registry->exists($index, $key);
	}
}

// ------------------------------------------------------------------------

/**
 * reg_delete()
 *
 * Deletes a registry index and key.
 *
 * Usage: $reult = reg_delete($index, $key);
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_delete'))
{
	function reg_delete($index = '', $key = '')
	{
        $_ci = get_instance();
		return $_ci->registry->delete($index, $key);
	}
}

// ------------------------------------------------------------------------

/**
 * reg_clear()
 *
 * Resets and clears out the registry arrays.
 *
 * Usage: reg_clear();
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('reg_clear'))
{
	function reg_clear()
	{
        $_ci = get_instance();
		$_ci->registry->clear();
	}
}


/* ------------------------------------------------------------------------
 * End of file registry_helper.php
 * Location: ./application/helpers/registry_helper.php
 * ------------------------------------------------------------------------
 */