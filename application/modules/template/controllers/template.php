<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 7:30:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Template	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	template
 * @category	category	template
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Template extends Public_Controller
{
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
	}

	// -----------------------------------------------------------------------

	/**
	 * public_one()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_one($data)
	{
	    $this->load->view('public_one', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_two_left()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_two_left($data)
	{
	    $this->load->view('public_two_left', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_two_right()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_two_right($data)
	{
	    $this->load->view('public_two_right', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_three()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_three($data)
	{
	    $this->load->view('public_three', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_fulid_one()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_fluid_one($data)
	{
	    $this->load->view('public_fluid_one', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_fulid_two_left()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_fluid_two_left($data)
	{
	    $this->load->view('public_fluid_two_left', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_fulid_two_right()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_fluid_two_right($data)
	{
	    $this->load->view('public_fluid_two_right', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * public_fulid_three()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function public_fluid_three($data)
	{
	    $this->load->view('public_fluid_three', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * admin_dashboard()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function admin_dashboard($data)
	{
	    $this->load->view('admin_dashboard', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * admin_fluid_dashboard()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function admin_fluid_dashboard($data)
	{
	    $this->load->view('admin_fluid_dashboard', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * user_dashboard()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function user_dashboard($data)
	{
	    $this->load->view('user_dashboard', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * user_fluid_dashboard()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function user_fluid_dashboard($data)
	{
	    $this->load->view('user_fluid_dashboard', $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * test()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function test()
	{
		$mtime = microtime();
		$mtime = explode(" ", $mtime);
		$mtime = $mtime[1] + $mtime[0];

		$starttime = $mtime;

		$string = "hello";
		$number = 1;

		for ($i = 1; $i <= 1000; $i++)
		{
			$string	= CRYPT($string, 'ad');
			$str	= md5($string);
			$number	= $number+1;

			echo $string."<br>";
		}

		echo $string;
		echo "<br><br>";

		$this->show_execution_time();

		$mtime		= microtime();
		$mtime		= explode(" ", $mtime);
		$mtime		= $mtime[1] + $mtime[0];
		$endtime	= $mtime;
		$totaltime	= ($endtime - $starttime);

		echo "This page was created in ".$totaltime." seconds";
		echo "<br>number ".$number;
}

	// -----------------------------------------------------------------------

	/**
	 * show_execution_time()
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function show_execution_time()
	{
		// Script start
		$rustart = getrusage();

		// Code ...

		// Script end
		function rutime($ru, $rus, $index)
		{
			return ($ru["ru_$index.tv_sec"]  * 1000 + intval($ru["ru_$index.tv_usec"]  / 1000))
				-  ($rus["ru_$index.tv_sec"] * 1000 + intval($rus["ru_$index.tv_usec"] / 1000));
		}

		$ru = getrusage();

		echo "This process used " . rutime($ru, $rustart, "utime") . " ms for its computations\n";
		echo "It spent " . rutime($ru, $rustart, "stime") . " ms in system calls\n";
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * Filename: template.php
 * Location: ./application/modules/template/controllers/template.php
 * ------------------------------------------------------------------------
 */