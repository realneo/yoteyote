<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 7:26:33 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Auth	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	auth
 * @category	category	auth
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2013, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Auth extends Auth_Controller
{
	/**
	 * -----------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * -----------------------------------------------------------------------
	 */

	/**
	 * groups array
	 * @var string
	 */
	public static $groups      = array();

	/**
	 * user groups array
	 * @var string
	 */
	public static $user_groups = array();

	/**
	 * login expire time
	 * @var string
	 */
	private $login_expire;

	/**
	 * remember me expire time
	 * @var string
	 */
	private $remember_expire;


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

		// Load the users model.
		$this->load->model('users/mdl_users', 'user');

		// Set the expire times.
		$this->login_expire    = (int) $this->config->item('login_expire');
		$this->remember_expire = (int) $this->config->item('remember_expire');

		// Check to see if the user is logged into the system
		if ($this->logged_in())
		{
			$this->_verify_user_cookie();
		}

		// If the users login attempt's cookie does not exist then create it.
		else
		{
			if ( ! array_key_exists('login_attempts', $_COOKIE))
			{
				setcookie("login_attempts", 0, time() + 900, '/');
			}
		}
	}

	// -----------------------------------------------------------------------

	/**
	 * restrict_user()
	 *
	 * modules::run('auth/restrict_user', 'admin');
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function restrict_user($group = NULL)
    {
		if ($group === NULL)
		{
			if ($this->logged_in() == TRUE)
			{
				return TRUE;
			}
			else
			{
				show_error($this->lang->line('insufficient_privs'));
			}
		}

		// See if the user has the correct group level
		elseif ($this->logged_in() == TRUE)
		{
			$id	= $this->session->userdata('user_id');

			$data = json_decode($this->check_user_groups($id, $group), TRUE);

			if ($data === FALSE)
			{
				show_error($this->lang->line('insufficient_privs'));
			}

			return TRUE;
		}
		else
		{
			redirect('admin/dashboard/', 'refresh');
		}
    }

	// -----------------------------------------------------------------------

	/**
	 * login()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function login($redirect = NULL)
	{
		if ($redirect === NULL)
		{
			$redirect = 'dashboard';
		}

		$data['module']    = 'auth';
		$data['view_file'] = "login_form";

		// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[5]|max_length[40]|callback_username_check');
		$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('user_remember_me', 'Remember Me');

		// Run the form.
		if ($this->form_validation->run($this) == FALSE)
		{
			if ((array_key_exists('login_attempts', $_COOKIE)) && ($_COOKIE['login_attempts'] >= 5))
			{
				echo $this->lang->line('max_login_attempts_error');
			}
			else
			{
				$this->load->module('template');
				$this->template->admin_dashboard($data);
			}
		}

		// Form Validation passed so log the user in.
		else
		{
			$user_name        = set_value('user_name');
			$login_type       = $this->_login_type($user_name);
			$user_password    = $this->_secure_hash(set_value('user_password'));
			$user_email       = set_value('user_email');

			// Get the Remember Me setting.
			$query = $this->user->get_where(array($login_type => $user_name));
			$row   = $query->row();

			$user_remember_me = set_checkbox('user_remember_me', $row->user_remember_me);

			// Verify the users details.
			if ( ! $this->_verify_user_details($login_type, $user_name, $user_password))
			{
				show_error($this->lang->line('login_details_error'));
			}

			// Get the users details from the database.
			$query = $this->user->get_where(array($login_type => $user_name));
			$row   = $query->row();

			$data = array(
				$login_type   => $user_name,
				'user_id'     => $row->id,
				'user_name'   => $row->user_name,
				'user_groups' => $this->check_user_groups($row->id),
				'logged_in'   => TRUE,
			);

			// Set the users session data.
			$this->session->set_userdata($data);

			// get current date and time
			$now = date('Y-m-d H:i:s');

			// Update the users Remember Me and IP Address.
			$data1 = array(
				'user_remember_me' => $this->input->post('user_remember_me', TRUE),
				'user_ip_address'  => $this->input->ip_address(),
				'user_last_login'  => set_now(),
			);

			// Update the users database record.
			$this->user->_update(array('user_name' => $user_name), $data1);

			// Check to see if the user want's to be remembered.
			if ($data1['user_remember_me'])
			{
				$this->_create_user_cookie();
			}
			else
			{
				setcookie("logged_in", '', 1, '/');
			}

			redirect($redirect, 'refresh');
		}
	}

	// -----------------------------------------------------------------------

	/**
	 * logout()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function logout()
	{
		$this->session->set_userdata('user_id', '');
		$this->session->sess_destroy();

		setcookie("logged_in", '', 1, '/');

		redirect('/');
	}

	// --------------------------------------------------------------------

	/**
	 * logged_in
	 *
	 * Check to see if a user is logged in
	 *
	 * Look in the session and return the 'logged_in' part
	 *
	 * @access public
	 * @param string
	 */
	public function logged_in()
	{
		return ($this->session->userdata('logged_in') === TRUE) ? TRUE : FALSE;
	}

	// -----------------------------------------------------------------------

	/**
	 * register()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function register($login = TRUE, $edit = FALSE, $id = NULL, $add = FALSE)
    {
    	// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[5]|max_length[40]|callback_reg_username_check');
		$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|min_length[5]|max_length[12]|matches[conf_password]');
		$this->form_validation->set_rules('conf_password', 'Password confirmation', 'trim|required|min_length[5]|max_length[12]|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email|callback_reg_email_check');

		// Setup for the module views.
		$data['module']     = 'auth';
		$data['view_file']  = "register_form";

		// Run the Form Validation
		if ($this->form_validation->run($this) === FALSE)
		{
			// Show the normal registration form
			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}

		// Register and login the new user to the system.
		else
		{
			$user_name     = set_value('user_name');
			$user_password = $this->_secure_hash(set_value('user_password'));
			$user_email    = set_value('user_email');

			// Create the new users database record
			$data = array(
				'user_name'       => $user_name,
				'user_email'      => $user_email,
				'user_password'   => $user_password,
				'user_ip_address' => $this->input->ip_address(),
				'user_created_at' => set_now(),
				'user_updated_at' => set_now(),
			);

			$insert_id = $this->user->_insert($data);

			/**
			 * -----------------------------------------------------
			 * Create the Users Profile Record...
			 * -----------------------------------------------------
			 */

			// Load the users model.
			$this->load->model('profile/mdl_profile', 'profile');

			// Load the profile module.
		    $this->load->module('profile');

			$data = array(
				'profile_user_id' => $insert_id,
			);

			$insert_id = $this->profile->_insert($data);

			$data2['msg'] = "The user has now been created.";

			/**
			 * ---------------------------------------------------------------------
			 * Add the new created user groups.
			 * ---------------------------------------------------------------------
			 */

			// Web site admin group
			if ($user_name == 'admin')
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '1',
				);
			}

			// Web site owner group
			else if ($user_name == 'owner')
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '2',
				);
			}

			// Web site user group default
			else
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '6',
				);
			}

			// Insert the new users group
			$result = modules::run('groups/insert_user_group', $data);

			// Everything passed so log the new user into the system
			if ($login === TRUE)
			{
				$data2['msg'] = "The user has been created, you have now been logged in.";

				// Get the users information from the database.
				$query = $this->user->get_where(array('user_name' => $user_name));
				$row   = $query->row();

				// Set the users session data variables
				$data = array(
					'user_name'   => $user_name,
					'user_id'     => $row->id,
					'user_groups' => $this->check_user_groups($row->id),
					'logged_in'   => TRUE
				);

				$this->session->set_userdata($data);

				// If remember me is TRUE then generate the users cookie.
				if ($row->user_remember_me === TRUE)
				{
					$this->_create_user_cookie();
				}
			}

			// Show the View
			$data['view_file'] = "reg_success";
			$data['module']    = 'auth';
			$data['msg']       = $data2['msg'];

			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}
    }

	// -----------------------------------------------------------------------

	/**
	 * add_user()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function add_user()
    {
    	// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[5]|max_length[40]|callback_reg_username_check');
		$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|min_length[5]|max_length[12]|matches[conf_password]');
		$this->form_validation->set_rules('conf_password', 'Password confirmation', 'trim|required|min_length[5]|max_length[12]|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email|callback_reg_email_check');

		// Setup for the module views.
		$data['module']     = 'auth';
		$data['view_file']  = "add_form";

		// Run the Form Validation
		if ($this->form_validation->run($this) === FALSE)
		{
			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}

		// Create the new users database record
		else
		{
			$user_name     = set_value('user_name');
			$user_password = $this->_secure_hash(set_value('user_password'));
			$user_email    = set_value('user_email');

			// Setup the database record data.
			$data = array(
				'user_name'       => $user_name,
				'user_email'      => $user_email,
				'user_password'   => $user_password,
				'user_ip_address' => $this->input->ip_address(),
				'user_created_at' => set_now(),
				'user_updated_at' => set_now(),
			);

			// Insert the new users record.
			$insert_id = $this->user->_insert($data);

			$data2['msg'] = "The user has now been created.";

			/**
			 * ---------------------------------------------------------------------
			 * Add the new created user groups.
			 * ---------------------------------------------------------------------
			 */

			// Web site admin group
			if ($user_name == 'admin')
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '1',
				);
			}

			// Web site owner group
			else if ($user_name == 'owner')
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '2',
				);
			}

			// Web site user group default
			else
			{
				$data = array(
					'user_id'  => $insert_id,
					'group_id' => '6',
				);
			}

			// Insert the new users group
			$result = modules::run('groups/insert_user_group', $data);

			// Show the View
			$data['view_file'] = "add_success";
			$data['module']    = 'auth';
			$data['msg']       = $data2['msg'];

			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}
    }

	// -----------------------------------------------------------------------

	/**
	 * edit_user()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function edit_user($id)
    {
    	// Load the Form Validation library and form helper.
		$this->load->library('form_validation');
		$this->load->helper('form');

		// Setup the Form Validation Rules.
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[5]|max_length[40]|callback_reg_username_check');
		$this->form_validation->set_rules('user_password', 'User Password', 'trim|required|min_length[5]|max_length[12]|matches[conf_password]');
		$this->form_validation->set_rules('conf_password', 'Password confirmation', 'trim|required|min_length[5]|max_length[12]|matches[user_password]');
		$this->form_validation->set_rules('user_email', 'User Email', 'trim|required|valid_email|callback_reg_email_check');

		// Get the users information.
		$query = $this->user->get_where(array('id' => $id));
		$row   = $query->row();

		$data['user_name']  = $row->user_name;
		$data['user_email'] = $row->user_email;

		// Setup for the module views.
		$data['module']     = 'auth';
		$data['view_file']  = "edit_form";

		// Run the Form Validation
		if ($this->form_validation->run($this) === FALSE)
		{
			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}

		// Update the users edited details.
		else
		{
			$user_name     = set_value('user_name');
			$user_password = $this->_secure_hash(set_value('user_password'));
			$user_email    = set_value('user_email');

			$data   = array(
				'user_name'       => $user_name,
				'user_email'      => $user_email,
				'user_password'   => $user_password,
				'user_updated_at' => set_now(),
			);

			$result = $this->user->_update(array('id' => $id), $data);

			$data2['msg'] = "The user has now been edited.";

			// Show the View
			$data['view_file'] = "edit_success";
			$data['module']    = 'auth';
			$data['msg']       = $data2['msg'];

			$this->load->module('template');
			$this->template->admin_dashboard($data);
		}
    }

	// --------------------------------------------------------------------

	/**
	 * _login_type()
	 *
	 * Check to see if a user is logging in with their username or their email
	 *
	 * @access private
	 * @param string
	 */
	private function _login_type($type)
	{
		$this->load->helper('email');

		if (valid_email($type))
		{
			return 'user_email';
		}
		else
		{
			return 'user_name';
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _verify_user_details()
	 *
	 * Verify that the username, email and password is correct
	 *
	 * @access private
	 * @param string
	 */
	private function _verify_user_details($auth_type, $user_name, $user_password)
	{
		$row = $this->user->verify_user_details($auth_type, $user_name, $user_password);

		if ($row === FALSE)
		{
			$attempts = $_COOKIE['login_attempts'] + 1;

			setcookie("login_attempts", $attempts, time() + 900, '/');

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * _create_user_cookie()
	 *
	 * Generate a new token/identifier
	 *
	 * @access private
	 * @param string
	 */
	private function _create_user_cookie()
	{
		// Get the user name from the session data.
		$user_name = $this->session->userdata('user_name');

		// Create a random string for token and identifier.
		$length		= 128;
		$characters	= '(0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!)';
		$token		= '';

		// Loop through and generate a new token.
		for ($i = 0; $i < $length; $i++)
		{
			$token .= $characters[mt_rand(0, strlen($characters) -1)];
		}

		// Create a new identifier and secure hash it.
		$identifier = $user_name . $token;
		$identifier = $this->_secure_hash($identifier);

		$data  = array(
			'user_identifier' => $identifier,
			'user_token'      => $token,
		);

		// Update the users database record.
		$result = $this->user->_update(array('user_name' => $user_name), $data);

		// Check to see if the user wants to be remembered.
		$query = $this->user->get_where(array('user_name' => $user_name));
		$row   = $query->row();

		// seconds * minutes * hours * days + current time -  86400 = 1 day
		// expiration time is set to a month (60 sec * 60 min * 24 hours * 30 days).
		// 86400 * 30 = 30 days.
		if ($row->user_remember_me)
		{
			setcookie("logged_in", $identifier, time() + (int) $this->remember_expire, '/');
		}
		else
		{
			setcookie("logged_in", $identifier, time() + (int) $this->login_expire, '/');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * _verify_user_cookie()
	 *
	 * Verify that a user has a cookie, if not generate one. If the cookie
	 * doesn't match the database, log the user out and show them an error.
	 *
	 * @access private
	 * @param string
	 */
	private function _verify_user_cookie()
	{
		if ((array_key_exists('login_attempts', $_COOKIE)) && ($_COOKIE['login_attempts'] >= 5))
		{
			$user_name = $this->session->userdata('user_name');

			$query = $this->user->get_where(array('user_name' => $user_name));
			$row   = $query->row();

			$identifier = $row->user_name . $row->user_token;
			$identifier = $this->_secure_hash($identifier);

			if ($identifier !== $_COOKIE['logged_in'])
			{
				$this->session->sess_destroy();

				show_error($this->lang->line('logout_perms_error'));
			}
		}
		else
		{
			$this->_create_user_cookie();
		}
	}

	// ------------------------------------------------------------------------

	/**
	 * secure_hash()
	 *
	 * Hashes the password and CI 32-bit encryption key
	 * using SHA-512. I place this key in my user_model.
	 *
	 * You can also pass in the password field to
	 * this method to generate the encryption key then return the value.
	 *
	 * NOTE: The Database password field needs to be varchar(128)
	 * Can also be used for generating hash for other values.
	 * You can also pass a second parameter to this method if needed.
	 *
	 * @access	private
	 * @param	string	- $default	- default value
	 * @param	string	- $optional	- optional value
	 * @retrun	string	- the 128 char encrypted string
	 */
	private function _secure_hash($default, $optional = '')
	{
		return hash_hmac('SHA512', $default . $optional, $this->config->item('encryption_key'));
	}

	// -----------------------------------------------------------------------

	/**
	 * check_user_groups()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
    public function check_user_groups($id, $group = '')
    {
		/** ADMIN - The default groups.
		 * array groups
		 *   1 => string 'admin'     (length=5)
		 *   2 => string 'owner'     (length=5)
		 *   3 => string 'moderator' (length=9)
		 *   4 => string 'editor'    (length=6)
		 *   5 => string 'members'   (length=7)
		 *   6 => string 'user'      (length=4)
		 *
		 * array user_groups - admin owner
		 *   1 => string '1' (length=1)
		 *   2 => string '2' (length=1)
		 */

		// Get a list of user groups.
		$this->groups = modules::run('group/get_groups');

		// Get a list of all the groups a user belongs to.
		$this->user_groups = modules::run('groups/get_user_groups', $id);

		if ($group == '')
		{
			foreach($this->user_groups as $key => $value)
			{
				$group = $this->groups[$value];
				break;
			}
		}

		foreach ($this->user_groups as $key)
		{
			$data[$key] = $this->groups[$key];
		}

		return (in_array($group, $data)) ? json_encode($data) : FALSE;
    }

	// --------------------------------------------------------------------

	/**
	 * user_name_check()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function user_name_check($str)
	{
		$login_type = $this->auth->_login_type($str);

		$result = $this->user->get_where(array($login_type => $str));

		if ($result === FALSE)
		{
			$this->form_validation->set_message('user_name_check', $this->lang->line('user_name_callback_error'));

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * reg_user_name_check()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function reg_user_name_check($str)
	{
		$result = $this->user->get_where(array('user_name' => $str));

		if ($result === FALSE)
		{
			$this->form_validation->set_message('reg_user_name_check', $this->lang->line('reg_user_name_callback_error'));

			return FALSE;
		}

		return TRUE;
	}

	// --------------------------------------------------------------------

	/**
	 * reg_email_check()
	 *
	 * Description:
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function reg_email_check($str)
	{
		$result = $this->user->get_where(array('user_email' => $str));

		if ($result === FALSE)
		{
			$this->form_validation->set_message('reg_email_check', $this->lang->line('reg_email_callback_error'));

			return FALSE;
		}

		return TRUE;
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: auth.php
 * Location: ./application/modules/auth/auth.php
 * ------------------------------------------------------------------------
 */