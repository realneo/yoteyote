<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by Php Designer 8.
 * Date : 5/10/2013
 * Time : 4:02:10 AM
 * The Learn CodeIgniter Development Team.
 * ------------------------------------------------------------------------
 *
 * Class Registry
 *
 * @package		Package		Application
 * @subpackage	Subpackage	properties
 * @category	category	properties
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

/**
 * SETUP:
 *
 * place this library in ./application/libraries/Registry.php
 *
 * Autoload: ./application/libraries/Registry.php
 * Autoload: ./application/helpers/registry_helper.php
 *
 * TESTING:
 *
 * In your Controller index method add.
 *
 * 		reg_set('1', 'test1', 'test1');
 * 		reg_set('1', 'test2', 'test1');
 * 		reg_set('1', 'test3', 'test1');
 *
 * 		reg_set('2', 'test4', 'test2');
 * 		reg_set('2', 'test5', 'test2');
 * 		reg_set('2', 'test6', 'test2');
 *
 * 		$result  = reg_get('1', 'test3');
 * 		$result1 = reg_get_index('2');
 * 		$exist   = reg_exists('2', 'test1');
 *
 * 		$result2 = reg_delete('1', 'test3');
 *
 * 		// Remove the remarks // to reset and clear out the reg array.
 * 		// reg_clear();
 *
 * DEBUGING:
 *
 * 		var_dump($this->registry->debug_properties());
 *
 * 		$this->registry->var_debug($this->registry->debug_registry(), $result, $result1, $exist, $result2);
 *
 * USAGE:
 *
 * set:			$this->registry->set('1', 'test1', 'test1');
 * get:			$result = $this->registry->get('1', 'test3');
 * get_index	$result = $this->registry->get_index('2');
 * exists:		$result = $this->registry->exists('2', 'test1');
 * clear:		$this->registry->clear();
 * delete:		$result2 = $this->registry->delete('1', 'test3');
 *
 */

class Registry {

	/**
	 * -----------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * -----------------------------------------------------------------------
	 */

	/**
	 * array ( $index => array ( $key => $val ));
	 */
	private static $reg = array(array());

	// -----------------------------------------------------------------------

	/**
	 * __construct()
	 *
	 * Constructor	PHP 5+	NOTE: Not needed if not setting values!
	 *
	 * @access	public
	 * @return	void
	 */
	public function __construct()
	{
		log_message('debug', 'Registry Class Initialized');
	}

	// -----------------------------------------------------------------------

	/**
	 * set()
	 *
	 * Set a registry index and key, value pair.
	 *
	 * @access	public
	 * @param	string	- $index	- The registry index
	 * @param	string	- $key		- The registry key
	 * @param	string	- $val		- The registry value
	 * @return	void
	 */
	public function set($index, $key, $val)
	{
		if ( ! isset($this->reg[$index][$key]))
		{
			$this->reg[$index][$key] = $val;
		}
	}

	// -----------------------------------------------------------------------

	/**
	 * get()
	 *
	 * Gets a registry and value.
	 *
	 * @access	public
	 * @param	string	- $index	- The registry index
	 * @param	string	- $key		- The registry key
	 * @return	mixed	- registry string or boolean FALSE
	 */
	public function get($index, $key)
	{
		if (isset($this->reg[$index][$key]))
		{
			return $this->reg[$index][$key];
		}

		return FALSE;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_index()
	 *
	 * Gets the array for this index.
	 *
	 * @access	public
	 * @param	string	- $index
	 * @return	mixed
	 */
    public function get_index($index = NULL)
    {
    	if ($index != NULL)
    	{
    		return $this->reg[$index];
   		}

		return FALSE;
    }

	// -----------------------------------------------------------------------

	/**
	 * exists()
	 *
	 * Checks to see if a registry exists.
	 *
	 * @access	public
	 * @param	string	- $index	- The registry index
	 * @param	string	- $key		- The registry key
	 * @return	bool	- TRUE if the registry exists otherwise FALSE.
	 */
	public function exists($index, $key)
	{
		return isset($this->reg[$index][$key]);
	}

	// -----------------------------------------------------------------------

	/**
	 * clear()
	 *
	 * Clears out and resets the registry arrays.
	 *
	 * @access	public
	 * @return	void
	 */
	public function clear()
	{
		$this->reg = array(array());
	}

	// -----------------------------------------------------------------------

	/**
	 * delete()
	 *
	 * Deletes a registry index key.
	 *
	 * @access	public
	 * @param	string	- $index	- The registry index
	 * @param	string	- $key		- The registry key
	 * @return	bool
	 */
	public function delete($index, $key)
	{
		if (isset($this->reg[$index][$key]))
		{
			unset($this->reg[$index][$key]);
			return TRUE;
		}

		return FALSE;
	}

	// -----------------------------------------------------------------------

	/**
	 * debug_registry()
	 *
	 * Debug the reg arrays.
	 *
	 * @access	public
	 * @return	array
	 */
	public function debug_registry()
	{
		return $this->reg;
	}

}	// End of Class


/* -------------------------------------------------------------------------
 * End of file Registry.php
 * Location: ./application/libraries/Registry.php
 * -------------------------------------------------------------------------
 */