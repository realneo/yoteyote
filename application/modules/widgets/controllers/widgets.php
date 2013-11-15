<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Name
 *
 * ------------------------------------------------------------------------
 * @package		Package		Name
 * @subpackage	Subpackage	name
 * @category	category	name
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Widgets extends Public_Controller
{
	/**
	 * -----------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * -----------------------------------------------------------------------
	 */


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

		$this->load->model('mdl_perfectmodel');

		log_message('debug', "Class Name Initialized");
	}

	// -----------------------------------------------------------------------

	/**
	 * get()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get($order_by)
	{
		$query = $this->mdl_perfectmodel->get($order_by);

		return $query;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_with_limit()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_with_limit($limit, $offset, $order_by)
	{
		$query = $this->mdl_perfectmodel->get_with_limit($limit, $offset, $order_by);

		return $query;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_where()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_where($id)
	{
		$query = $this->mdl_perfectmodel->get_where($id);

		return $query;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_where_custom()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_where_custom($col, $value)
	{
		$query = $this->mdl_perfectmodel->get_where_custom($col, $value);

		return $query;
	}

	// -----------------------------------------------------------------------

	/**
	 * _insert()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _insert($data)
	{
		$this->mdl_perfectmodel->_insert($data);
	}

	// -----------------------------------------------------------------------

	/**
	 * _update()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _update($id, $data)
	{
		$this->mdl_perfectmodel->_update($id, $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * _delete()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _delete($id)
	{
		$this->mdl_perfectmodel->_delete($id);
	}

	// -----------------------------------------------------------------------

	/**
	 * count_where()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function count_where($column, $value)
	{
		$count = $this->mdl_perfectmodel->count_where($column, $value);

		return $count;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_max()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_max()
	{
		$max_id = $this->mdl_perfectmodel->get_max();

		return $max_id;
	}

	// -----------------------------------------------------------------------

	/**
	 * _custom_query()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _custom_query($mysql_query)
	{
		$query = $this->mdl_perfectmodel->_custom_query($mysql_query);

		return $query;
	}

}

/* ------------------------------------------------------------------------
 * End of file filename.php
 * Location: ./application/dir_name/filename.php
 * ------------------------------------------------------------------------
 */