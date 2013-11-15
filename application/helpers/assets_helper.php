<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.
 * Date  : 12/22/2012
 * Time  : 6:15:20 PM
 * Author: Raymond L King Sr. - The Learn CodeIgniter Development Team.
 * ------------------------------------------------------------------------
 *
 * Helper	assets_helper
 *
 * ------------------------------------------------------------------------
 * @package		Package		CodeIgniter
 * @subpackage	Subpackage	helpers
 * @category	category	helper
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

// ------------------------------------------------------------------------

/**
 * Expects that all resources are in an assets directory in the root folder.
 *
 * application
 * system
 * index.php
 * assets
 * -- css
 * -- js
 * -- img
 * -- images
 * -- ico
 * -- media
 * -- themes
 * -- etc
 *
 * Usage:
 *
 *  <?php echo css_url('app.css'); ?>
 *
 * You can also pass in a directory to the method's
 *
 *  <?php echo css_url('directory/app.css'); ?>
 *
 */

// ------------------------------------------------------------------------

/**
 * Helper assets_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('assets_url'))
{
	function assets_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper css_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('css_url'))
{
	function css_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/css/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper editor_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('editor_url'))
{
	function editor_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/editor/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper ckeditor_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('ckeditor_url'))
{
	function ckeditor_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/ckeditor/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper js_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('js_url'))
{
	function js_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/js/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper img_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('img_url'))
{
	function img_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/img/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper image_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('image_url'))
{
	function image_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/images/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper ico_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('ico_url'))
{
	function ico_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/ico/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper media_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('media_url'))
{
	function media_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/media/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper smiley_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('smiley_url'))
{
	function smiley_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/smileys/'.$uri);
	}
}

// ------------------------------------------------------------------------

/**
 * Helper theme_url()
 *
 * @access	public
 * @param	string
 * @return	string
 */
if ( ! function_exists('theme_url'))
{
	function theme_url($uri)
	{
		$_ci = get_instance();
		return $_ci->config->base_url('assets/themes/'.$uri);
	}
}


if ( ! function_exists('active_link'))
{
	function active_link($controller)
	{
		$_ci = get_instance();
		$class = $_ci->router->fetch_class();
		return ($class == $controller) ? 'active' : '';
	}
}

/* ------------------------------------------------------------------------
 * End of file assets_helper.php
 * Location: ./application/helpers/assets_helper.php
 * ------------------------------------------------------------------------
 */