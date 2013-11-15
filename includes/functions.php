<?php

/**
 * ------------------------------------------------------------------------
 * Global Application Functions and Methods.
 * ------------------------------------------------------------------------
 * @package		yoteyote
 * @subpackage	yoteyote
 * @category	functions
 * @version		1.0
 * @author		Raymond L King Sr.
 * @license		MIT License
 * @copyright	Copyright (c) 2009 - 2013, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * Editor : phpDesigner 8.1.2 - Created on: 11/12/2013 9:20:29 AM
 * ------------------------------------------------------------------------
 */

// ------------------------------------------------------------------------

/**
 * Generate full url
 * example:
 * echo base_url('news/list');
 *
 * output:
 * http://yoursite.com/news/list
 *
 * @param string $url
 * @return string
 */
if ( ! function_exists('base_url'))
{
	function base_url($uri = '')
	{
		if ( ! empty($uri))
		{
			return BASE_URL . $uri;
		}

		return BASE_URL;
	}
}

// ------------------------------------------------------------------------

/**
 * Generate full url
 * example:
 * echo site_url('news/list');
 *
 * output:
 * http://yoursite.com/index.php/news/list
 *
 * @param string $uri
 * @return string
 */
if ( ! function_exists('site_url'))
{
	function site_url($uri = '')
	{
		if ( ! empty($uri))
		{
			return BASE_URL . 'index.php/' . $uri;
		}

		return BASE_URL . 'index.php/';
	}
}

// ------------------------------------------------------------------------

/**
 * Header Redirect
 *
 * Header redirect in two flavors
 * For very fine grained control over headers, you could use the Output
 * Library's set_header() function.
 *
 * @access	public
 * @param	string	the URL
 * @param	string	the method: location or redirect
 * @return	string
 */
if ( ! function_exists('redirect'))
{
	function redirect($uri = '', $method = 'location', $http_response_code = 302)
	{
		if ( ! preg_match('#^https?://#i', $uri))
		{
			$uri = site_url($uri);
		}

		switch($method)
		{
			case 'refresh'	: header("Refresh:0;url=".$uri);
				break;

			default			: header("Location: ".$uri, TRUE, $http_response_code);
				break;
		}

		exit;
	}
}

// ------------------------------------------------------------------------

/**
 * now
 * example:
 * $date = now();
 */
if ( ! function_exists('now'))
{
	function now()
	{
		return date('Y-m-d H:i:s');
	}
}

// --------------------------------------------------------------------

/**
 * array_to_object()
 *
 * Converts an array to an object.
 *
 * @access	public
 * @param	array	- the array to convert to an object
 * @return	mixed
 */
if ( ! function_exists('array_to_object'))
{
	function array_to_object($array)
	{
		if (is_array($array))
		{
			// Return array converted to object Using __FUNCTION__
			// (Magic constant) for recursive call
			return (object) array_map(__FUNCTION__, $array);
		}
		else
		{
			return $array;
		}
	}
}

// -----------------------------------------------------------------------

/**
 * object_to_array()
 *
 * Converts an object to an array.
 *
 * $array = object_to_array($object);
 *
 * @param		object	-	$object The object to convert
 * @return		array
 */
if ( ! function_exists('object_to_array'))
{
	function object_to_array($object)
	{
		if (is_object($object))
		{
			// Gets the properties of the given object with get_object_vars function
			$object = get_object_vars($object);
		}

		if (is_array($object))
		{
			// Return array converted to object Using __FUNCTION__
			// (Magic constant) for recursive call
			return array_map(__FUNCTION__, $object);
		}
		else
		{
			return $object;
		}
	}
}

// -----------------------------------------------------------------------

/**
 * Debug Helper
 *
 * Outputs the given variable(s) with formatting and location
 *
 * @access	public
 * @param	mixed	- variables to be output
 */
if ( ! function_exists('var_debug'))
{
	function var_debug()
	{
		list($callee) = debug_backtrace();

		$arguments = func_get_args();

		$total_arguments = func_num_args();

		echo '<div><fieldset style="background: #fefefe !important; border:1px red solid; padding:15px">';
		echo '<legend style="background:lightgrey; padding:5px;">'.$callee['file'].' @line: '.$callee['line'].'</legend><pre><code>';

		$i = 0;
		foreach ($arguments as $argument)
		{
			echo '<strong>Debug #'.++$i.' of '.$total_arguments.'</strong>: '.'<br>';
			var_dump($argument);
		}

		echo "</code></pre></fieldset><div><br>";
		exit;
	}
}

/**
 * ------------------------------------------------------------------------
 * Filename: functions.php
 * Location: ./incudes/functions.php
 * ------------------------------------------------------------------------
 */