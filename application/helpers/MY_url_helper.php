<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor  : phpDesigner 8.1.2
 * Date    : 10/19/2013
 * Time    : 3:07:52 PM
 * Authors : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	MY_url_helper
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

// ------------------------------------------------------------------------

/**
 * Helper Name
 *
 * Usage:	set_active($seg_num, $menu_name, $home_page = '');
 *
 * NOTE: Make sure you leave a space between the <li >
 *
 * - Setting the home page active, second parameter must be '' null.
 *
 * 	<li <?php echo set_active(1, '', 'home'); ?>>
 * 		<?php echo anchor('/', 'Home', 'title="Home"'); ?>
 * 	</li>
 *
 * - Setting the other pages active
 *
 * 	<li <?php echo set_active(2, 'about'); ?>>
 * 		<?php echo anchor('welcome/about', 'About'); ?>
 * 	</li>
 *
 * 	<li <?php echo set_active(2, 'contact'); ?>>
 * 		<?php echo anchor('welcome/contact', 'Contact'); ?>
 * 	</li>
 *
 * @access	public
 * @param	array
 * @return	mixed	depends on what the array contains
 */
if ( ! function_exists('set_active'))
{
	function set_active($seg_num, $menu_name, $home_page = '')
	{
		$_ci = get_instance();

		$seg_num = (int) $seg_num;

		// Check to make sure we have a segment number!
		if (empty($seg_num) OR is_null($seg_num) OR $seg_num == '0')
		{
			show_error('ERROR: You must provide a Segment Number to this Method!');
		}

		// Set the main home page active when selected.
		if ($menu_name == '' AND $home_page != '')
		{
			return ($_ci->uri->segment($seg_num) == '' OR $_ci->uri->segment($seg_num) == $home_page) ? 'class="active"' : '';
		}

		// Set the other pages active when selected
		else
		{
			return ($_ci->uri->segment($seg_num) == $menu_name) ? 'class="active"' : '';
		}
	}
}


/**
 * ------------------------------------------------------------------------
 * End of file name_helper.php
 * Location: ./application/helpers/name_helper.php
 * ------------------------------------------------------------------------
 */