<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------

/**
 * bread_crumbs()
 *
 * Display's a list of bread crumbs in the current page.
 *
 * @access	public
 * @param	string
 * @return	mixed
 */
if ( ! function_exists('bread_crumbs'))
{
	function bread_crumbs()
	{
		$html = '';
        $html = '<li><i class="fa fa-file-o"></i></li>'."\n";

		$i = 1;

		$_ci = get_instance();

		// Get all the uri segments.
		$segs = $_ci->uri->segment_array();

		$num_segs = count($segs);

		// Loop through the segements and create the html output.
		foreach ($segs as $segment)
		{
			if ($num_segs == $i)
			{
				$html .= '<li ><a href="">'.$segment.'</a></li>'."\n";
			}
			else
			{
				$html .= '<li>'.$segment.'</li>'."\n";
			}

			$i++;
		}

		return $html;
	}
}

// --------------------------------------------------------------------

/**
 * set_now()
 *
 * Converts an array to an object.
 *
 * @access	public
 * @param	array	- the array to convert to an object
 * @return	mixed
 */
if ( ! function_exists('set_now'))
{
	function set_now()
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
 * @author	Raymond L King Sr.
 * @access	public
 * @param	mixed	- variables to be output
 */
if ( ! function_exists('var_debug'))
{
	function var_debug()
	{
		list($params) = debug_backtrace();

		$arguments = func_get_args();

		$total_arguments = func_num_args();

		echo '<div><fieldset style="background: #fefefe !important; border:1px red solid; padding:15px">';
		echo '<legend style="background:lightgrey; padding:5px;">'.$params['file'].' @line: '.$params['line'].'</legend><pre><code>';

		$i = 0;
		foreach ($arguments as $argument)
		{
			echo '<strong>Debug #'.++$i.' of '.$total_arguments.'</strong>: '.'<br>';
			var_dump($argument);
		}

		echo "</code></pre></fieldset><div><br>";
	}
}

/**
 * ------------------------------------------------------------------------
 * End of file util_helper.php
 * Location: ./application/helpers/util_helper.php
 * ------------------------------------------------------------------------
 */