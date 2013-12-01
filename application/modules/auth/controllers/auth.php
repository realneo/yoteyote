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

		// Load the users and profile models.
		$this->load->model('auth/mdl_users', 'user');
		$this->load->model('auth/mdl_profiles', 'profiles');

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
		if ($this->logged_in() == TRUE)
		{
			//$id	= $this->session->userdata('user_id');

			//$data = json_decode($this->check_user_groups($id, $group), TRUE);

			//if ($data === FALSE)
			//{
			//	show_error($this->lang->line('insufficient_privs'));
			//}

			//return TRUE;

			if (user_group($group != 'admin'))
			{
				redirect('/', 'refresh');
			}

			// Redirect to the admin dashboard
			else
			{
				redirect('admin/dashboard/', 'refresh');
			}
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
				$data = $this->set_page_data('page_special_login');

				$data['module']    = 'auth';
				$data['view_file'] = "page_special_login";

				$this->load->view('page_special_login', $data);
			}
		}

		// Form Validation passed so log the user in.
		else
		{
			// See if the forms have been submitted!
			$submit = $this->input->post(NULL, TRUE);

			// Has the login form been submitted?
			if (isset($submit['login']))
			{
				//var_debug($submit['login']);
				//exit;

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

				// assign the profile id with the users id
				$profile_user_id = $row->id;

				// Get the users profile information.
				$query   = $this->profiles->get_where(array('profile_user_id' => $profile_user_id));
				$pro_row = $query->row();

				// The users session data array.
				$data = array(
					$login_type   => $user_name,
					'user_id'     => $row->id,
					'user_name'   => $row->user_name,
					'first_name'  => $pro_row->profile_first_name,
					'last_name'   => $pro_row->profile_last_name,
					'pic'         => $pro_row->profile_pic,
					'user_groups' => $this->check_user_groups($row->id),
					'logged_in'   => TRUE,
				);

				//var_debug($data); exit;

				// Set the users session data.
				$this->session->set_userdata($data);

				// Update the users RememberMe, IP Address and Last time logged in.
				$data1 = array(
					'user_remember_me' => $user_remember_me,
					'user_ip_address'  => $this->input->ip_address(),
					'user_last_login'  => set_now(),
				);

				// Update the users database record.
				$this->user->_update(array('user_name' => $user_name), $data1);

				// Check to see if the user want's to be remembered.
				if ( ! empty($data1['user_remember_me']))
				{
					$this->_create_user_cookie();
				}
				else
				{
					setcookie("logged_in", '', 1, '/');
				}
			}

			// Has the registration form been submitted?
			elseif (isset($submit['register']))
			{
				//var_debug($submit['register']);
				//exit;

				$login = TRUE;

				$user_name     = set_value('user_name');
				$user_password = $this->_secure_hash(set_value('user_password'));
				$user_email    = set_value('user_email');

				// Create the new users database record
				$data = array(
					'user_name'       => $this->input->post('user_name', true),
					'user_email'      => $this->input->post('user_email', true),
					'user_password'   => $user_password,
					'user_ip_address' => $this->input->ip_address(),
					'user_last_login' => set_now(),
					'user_created_at' => set_now(),
					'user_updated_at' => set_now(),
				);

				$insert_id = $this->user->_insert($data);

				/**
				 * -----------------------------------------------------
				 * Create the Users Profile Record...
				 * -----------------------------------------------------
				 */

				$data = array(
					'profile_user_id' => $insert_id,
				);

				$result = $this->profiles->_insert($data);

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
				elseif ($user_name == 'owner')
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

					// assign the profile id with the users id
					$profile_user_id = $row->id;

					// Get the users profile information.
					$query   = $this->profile->get_where(array('profile_user_id' => $profile_user_id));
					$pro_row = $query->row();

					// The users session data array.
					$data = array(
						'user_id'     => $row->id,
						'user_name'   => $row->user_name,
						'first_name'  => $pro_row->profile_first_name,
						'last_name'   => $pro_row->profile_last_name,
						'pic'         => $pro_row->profile_pic,
						'user_groups' => $this->check_user_groups($row->id),
						'logged_in'   => TRUE,
					);

					// Set the users session data array.
					$this->session->set_userdata($data);

					// Create the users cookie.
					$this->_create_user_cookie();
				}
			}

			if ($redirect === NULL)
			{
				if (user_group('admin'))
				{
					$redirect = 'dashboard';
				}
				else
				{
					$redirect = '/';
				}
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

		return;
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
			$this->template->render('admin_fluid_dashboard', $data);
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
			$this->template->render('admin_fluid_dashboard', $data);
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
			$this->template->render('admin_fluid_dashboard', $data);
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
			$this->template->render('admin_fluid_dashboard', $data);
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
		$row = $this->user->verify_user_details($auth_type, $user_name);

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
		if ( ! empty($row->user_remember_me))
		{
			setcookie("logged_in", $identifier, time() + (int) $this->remember_expire, '/');
		}

		// The user doe's not want to be Remembered.
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
    	$data = array();

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

		//var_debug($this->groups, $this->user_groups);
		//exit;

		if ($group == '')
		{
			foreach ($this->user_groups as $key => $value)
			{
				$group = $this->groups[$value];

				if ($group == $this->groups[$value])
				{
					break;
				}
			}
		}

		foreach ($this->user_groups as $key)
		{
			$data[$key] = $this->groups[$key];
		}

		//var_debug($data);
		//exit;

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

	// ------------------------------------------------------------------------

	/**
	 * set_page_data()
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
    public function set_page_data($page)
    {
    	/**
    	 * -------------------------------------------------------------------
		 * The FreshUI Main Configuration data array.
		 * -------------------------------------------------------------------
		 */

		$data = array(
			'template' => array(
    			'name'          => 'Yoteyote',
			    'version'       => '1.0',
			    'author'        => 'Yoteyote',
			    'title'         => 'YoteyoteUI - Premium Web App and Admin Template',
			    'description'   => 'YoteyoteUI is a Premium Web App and Admin Template',
				'keywords'      => 'Yoteyote',

			    // ''               empty to remove full width from the page (< 992px: 100%, > 992px: 95%, 1440px max width)
			    // 'full-width'     for a full width page (100%, 1920px max width)
			    'page'          => 'full-width',

			    // 'navbar-default' for a light header
			    // 'navbar-inverse' for a dark header
			    'header_navbar' => 'navbar-default',

			    // 'navbar-fixed-top'     for a top fixed header
			    // 'navbar-fixed-bottom'  for a bottom fixed header
			    'header'        => 'navbar-fixed-top',

			    // ''                  left sidebar will open only from the top left toggle button (better website performance)
			    // 'enable-hover'      will make a small portion of left sidebar visible, so that it can be opened with a mouse hover (> 1200px) (may affect website performance)
			    'sidebar_left'  => 'enable-hover',

			    // ''                  right sidebar will open only from the top right toggle button (better website performance)
			    // 'enable-hover'      will make a small portion of right sidebar visible, so that it can be opened with a mouse hover (> 1200px) (may affect website performance)
			    'sidebar_right'  => '',

			    // ''                                            empty for default behavior
			    // 'sidebar-left-pinned'                         for a left pinned sidebar (always visible > 1200px)
			    // 'sidebar-right-pinned'                        for a right pinned sidebar (always visible > 1200px)
			    // 'sidebar-left-pinned sidebar-right-pinned'    for both sidebars pinned (always visible > 1200px)
			    'navigation'    => '',

			    // All effects apply in resolutions larger than 1200px width
			    // 'fx-none'           remove all effects from main content when one of the sidebars are open (better website performance)
			    // 'fx-opacity'        opacity effect
			    // 'fx-move'           move effect
			    // 'fx-push'           push effect
			    // 'fx-rotate'         rotate effect
			    // 'fx-push-move'      push-move effect
			    // 'fx-push-rotate'    push-rotate effect
			    'content_fx'    => 'fx-opacity',

			    //  Available themes: 'river', 'amethyst' , 'dragon', 'emerald', 'grass' or '' leave empty for the default fresh orange
			    'theme'         => 'dragon',
			    //'theme'         => $this->input->cookie('theme_cookie', TRUE),

			    //'active_page'   => basename($_SERVER['PHP_SELF']),
			    'active_page'   => current_url($page),  // To get the CI current page.
			),
		);

		// ----------------------------------------------------------------------

		/**
		 * ----------------------------------------------------------------------
		 * This data is for the Main navigation menus.
		 * ----------------------------------------------------------------------
		 */

		// Check login
		$result_1 = user_group('admin');
		$result_2 = user_group('user');

		if ($result_1 == true)
		{
			$dash = ($result_1 == true) ? 'Dashboard' : 'Home';
			$base = ($result_1 == true) ? base_url('dashboard') : base_url('/');
		}
		elseif ($result_2 == true)
		{
			$dash = ($result_2 == true) ? 'Profile' : 'Home';
			$base = ($result_2 == true) ? base_url('profile') : base_url('/');
		}
		else
		{
			$dash = 'Home';
			$base = base_url('/');
		}

		$data['primary_nav'] = array(
		    array(
        		'name'  => 'Welcome',
		        'url'   => 'header'
		    ),
		    array(
        		'name'  => $dash,
		        'url'   => $base,
        		'icon'  => 'fa fa-coffee'
		    ),
		    array(
        		'name'  => 'User Interface',
		        'url'   => 'header',
		    ),
		    array(
        		'name'  => 'Elements',
		        'icon'  => 'fa fa-rocket',
        		'sub'   => array(
		            array(
    		            'name'  => 'Typography',
        		        'url'   => base_url('home/page_elements_typography'),
            		),
	            	array(
    	            	'name'  => 'Blocks - Grid',
	        	        'url'   => base_url('home/page_elements_blocks_grid'),
    	        	),
	    	        array(
    	    	        'name'  => 'Navigation - Extras',
        	    	    'url'   => base_url('home/page_elements_navigation_extras'),
	            	),
		            array(
    		            'name'  => 'Buttons - Dropdowns',
        		        'url'   => base_url('home/page_elements_buttons_dropdowns'),
            		),
		            array(
    		            'name'  => 'Progress - Loading',
        		        'url'   => base_url('home/page_elements_progress_loading'),
            		)
		        )
    		),
		    array(
	        	'name'  => 'Tables',
    		    'icon'  => 'fa fa-th',
		        'sub'   => array(
        		    array(
                		'name'  => 'Styles',
		                'url'   => base_url('home/page_tables_styles'),
        		    ),
		            array(
        		        'name'  => 'Datatables',
                		'url'   => base_url('home/page_tables_datatables'),
		            ),
        		    array(
                		'name'  => 'Editable',
		                'url'   => base_url('home/page_tables_editable'),
        		    )
		        )
		    ),
		    array(
        		'name'  => 'Forms',
		        'icon'  => 'fa fa-pencil-square-o',
        		'sub'   => array(
		            array(
        		        'name'  => 'General',
		                'url'   => base_url('home/page_forms_general'),
        		    ),
		            array(
        		        'name'  => 'Components',
                		'url'   => base_url('home/page_forms_components'),
		            ),
        		    array(
                		'name'  => 'Validation',
		                'url'   => base_url('home/page_forms_validation'),
        		    ),
		            array(
        		        'name'  => 'Wizard',
                		'url'   => base_url('home/page_forms_wizard'),
		            )
        		)
		    ),
		    array(
        		'name'  => 'Icon Packs',
		        'icon'  => 'fa fa-gift',
        		'sub'   => array(
		            array(
        		        'name'  => 'Font Awesome',
                		'url'   => base_url('home/page_icons_fontawesome'),
		            ),
        		    array(
                		'name'  => 'Glyphicons Pro',
		                'url'   => base_url('home/page_icons_glyphicons_pro'),
        		    )
		        )
		    ),
		    array(
        		'name'  => 'Extras',
		        'url'   => 'header',
		    ),
		    array(
        		'name'  => 'Components',
		        'icon'  => 'fa fa-gear',
        		'sub'   => array(
		            array(
						'name'  => 'Animations',
		                'url'   => base_url('home/page_comp_animations'),
        		    ),
		            array(
        		        'name'  => 'Carousel',
                		'url'   => base_url('home/page_comp_carousel'),
		            ),
        		    array(
                		'name'  => 'Gallery',
		                'url'   => base_url('home/page_comp_gallery'),
        		    ),
		            array(
        		        'name'  => 'Calendar',
                		'url'   => base_url('home/page_comp_calendar'),
		            ),
        		    array(
                		'name'  => 'Charts',
		                'url'   => base_url('home/page_comp_charts'),
        		    ),
		            array(
        		        'name'  => 'Syntax Highlighting',
                		'url'   => base_url('home/page_comp_syntax_highlighting'),
		            ),
        		    array(
                		'name'  => 'Maps',
		                'url'   => base_url('home/page_comp_maps'),
        		    )
		        )
		    ),
		    array(
        		'name'  => 'Pages',
		        'icon'  => 'fa fa-file',
        		'sub'   => array(
		            array(
        		        'name'  => 'Blank',
                		'url'   => base_url('home/page_ready_blank'),
		            ),
        		    array(
                		'name'  => '404 Error',
		                'url'   => base_url('home/page_ready_404'),
        		    ),
		            array(
        		        'name'  => 'Search Results',
                		'url'   => base_url('home/page_ready_search_results'),
		            ),
        		    array(
                		'name'  => 'Pricing Tables',
		                'url'   => base_url('home/page_ready_pricing_tables'),
        		    ),
		            array(
        		        'name'  => 'FAQ',
                		'url'   => base_url('home/page_ready_faq'),
		            ),
        		    array(
                		'name'  => 'Invoice',
		                'url'   => base_url('home/page_ready_invoice'),
        		    ),
		            array(
        		        'name'  => 'Article',
                		'url'   => base_url('home/page_ready_article'),
		            ),
        		    array(
                		'name'  => 'Forum',
		                'url'   => base_url('home/page_ready_forum'),
        		    )
		        )
		    ),
		    array(
		        'name'  => '3 Level Menu',
        		'icon'  => 'glyphicon-tint',
		        'sub'   => array(
        		    array(
                		'name'  => 'Link 1',
		                'url'   => '#'
        		    ),
		            array(
        		        'name'  => 'Submenu 1',
                		'sub'   => array(
		                    array(
        		                'name'  => 'Link',
                		        'url'   => '#'
		                    ),
        		            array(
                		        'name'  => 'Link',
                        		'url'   => '#'
		                    ),
        		            array(
                		        'name'  => 'Link',
                        		'url'   => '#'
		                    )
        		        )
		            ),
        		    array(
                		'name'  => 'Link 2',
		                'url'   => '#'
        		    ),
		            array(
        		        'name'  => 'Submenu 2',
                		'sub'   => array(
		                    array(
        		                'name'  => 'Link',
                		        'url'   => '#'
		                    ),
        		            array(
                		        'name'  => 'Link',
                        		'url'   => '#'
		                    )
        		        )
		            )
        		)
		    ),
		    array(
        		'name'  => 'Special',
		        'url'   => 'header',
		    ),
		    array(
        		'name'  => 'Timeline',
		        'url'   => base_url('home/page_special_timeline'),
        		'icon'  => 'fa fa-clock-o'
		    ),
		    array(
        		'name'  => 'User Profile',
		        'url'   => base_url('home/page_special_user_profile'),
        		'icon'  => 'fa fa-pencil-square'
		    ),
		    array(
        		'name'  => 'Message Center',
		        'url'   => base_url('home/page_special_message_center'),
		        'icon'  => 'fa fa-envelope-o'
		    ),
		    array(
        		'name'  => 'Yoteyote Page',
		        'url'   => base_url('home/page_ready_yoteyote_blank'),
		        'icon'  => 'fa fa-envelope-o'
		    ),
		    array(
        		'name'  => 'Login &amp; Register',
		        //'url'   => base_url('home/page_special_login'),
		        'url'   => base_url('login'),
        		'icon'  => 'fa fa-power-off'
		    )
		);

		return $data;
    }

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: auth.php
 * Location: ./application/modules/auth/auth.php
 * ------------------------------------------------------------------------
 */