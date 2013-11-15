<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Created by Php Designer 8.
 * Date : 5/6/2012
 * Time : 11:19:06 PM
 * ------------------------------------------------------------------------
 *
 * Class MY_Session
 *
 * @package		Package		CodeIgniter
 * @subpackage	Subpackage	session
 * @category	category	sessions
 * @author		Raymond L King Sr.
 * @link		http://example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

/**
 * ------------------------------------------------------------------------
 * CI Session Class Extension for AJAX calls.
 * ------------------------------------------------------------------------
 *
 * ====- Save as application/libraries/MY_Session.php -====
 */

class MY_Session extends CI_Session {

	// --------------------------------------------------------------------

	/**
	 * sess_update()
	 *
     * Do not update an existing session on ajax or xajax calls
     *
     * @access    public
     * @return    void
     */
    public function sess_update()
	{
		$_ci = get_instance();

		$ajax = $_ci->input->is_ajax_request();

		if ($ajax === FALSE)
		{
			parent::sess_update();
		}
    }

	// --------------------------------------------------------------------

	/**
	 * sess_destroy()
	 *
     * Clear's out the user_data array on sess::destroy.
     *
     * @access    public
     * @return    void
     */
	public function sess_destroy()
	{
		$this->userdata = array();

		parent::sess_destroy();
	}

}

/**
 * ------------------------------------------------------------------------
 * End of file MY_Session.php
 * Location: ./application/libraries/MY_Session.php
 * ------------------------------------------------------------------------
 */