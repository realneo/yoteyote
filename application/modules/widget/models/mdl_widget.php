<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1
 * Date  : 8/17/2013
 * Time  : 6:41:04 AM
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

class Mdl_perfectmodel extends CI_Model {

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
	}

	// -----------------------------------------------------------------------

	/**
	 * get_table()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_table()
	{
	    $table = "tablename";

	    return $table;
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
		$table = $this->get_table();
		$this->db->order_by($order_by);
		$query = $this->db->get($table);

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
		$table = $this->get_table();
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by);
		$query = $this->db->get($table);

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
		$table = $this->get_table();
		$this->db->where('id', $id);
		$query = $this->db->get($table);

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
		$table = $this->get_table();
		$this->db->where($col, $value);
		$query = $this->db->get($table);

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
		$table = $this->get_table();
		$this->db->insert($table, $data);
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
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->update($table, $data);
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
		$table = $this->get_table();
		$this->db->where('id', $id);
		$this->db->delete($table);
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
		$table = $this->get_table();
		$this->db->where($column, $value);
		$query = $this->db->get($table);

		$num_rows = $query->num_rows();

		return $num_rows;
	}

	// -----------------------------------------------------------------------

	/**
	 * count_all()
	 *
	 *
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function count_all()
	{
		$table = $this->get_table();
		$query = $this->db->get($table);

		$num_rows = $query->num_rows();

		return $num_rows;
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
		$table = $this->get_table();
		$this->db->select_max('id');
		$query = $this->db->get($table);

		$row = $query->row();
		$id = $row->id;

		return $id;
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
		$query = $this->db->query($mysql_query);

		return $query;
	}

}

/* ------------------------------------------------------------------------
 * End of file filename.php
 * Location: ./application/dir_name/filename.php
 * ------------------------------------------------------------------------
 */