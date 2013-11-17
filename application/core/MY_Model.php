<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor  : phpDesigner 8.1.2
 * Date    : 10/17/2013
 * Time    : 8:21:40 AM
 * Authors : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	MY_Model
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class MY_Model extends CI_Model
{
	/**
	 * -----------------------------------------------------------------------
	 * EXAMPLES:
	 * -----------------------------------------------------------------------
	 *
	 * Return an Object:
	 * $result = $query->result()  - $row->title;
	 * $row    = $query->row()     - $row->title;
	 *
	 * Return an Array:
	 * $result = $query->result_array() - $row['title'];
	 * $row    = $query->row_array()    - $row['title'];
	 * -----------------------------------------------------------------------
	 *
	 * SEE: The method comments also.
	 *
	 * $where	 = array('col' => 'value');
	 * $group_by = array("title", "date");
	 * $order_by = 'id asc'; or order_by = 'id asc, title desc';
	 * -----------------------------------------------------------------------
	 */

	/**
	 * --------------------------------------------------------------------
	 * Class variables - public, private, protected and static.
	 * --------------------------------------------------------------------
	 */

	/**
	 * Holds the database table name
	 * @var string
	 */
    public $table;

	/**
	 * The database default record limit.
	 * @var string
	 */
	public $limit = 10;


	// --------------------------------------------------------------------

	/**
	 * __Construct()
	 *
	 * Constructor	PHP 5+	NOTE: Not needed if not setting values!
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
	 * set_table()
	 *
	 * Call from your model __constructor()
	 *
	 * USAGE:
	 *
	 * $this->set_table('users');
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_table($table_name = '')
	{
		$this->table = $table_name;
	}

	// -----------------------------------------------------------------------

	/**
	 * get()
	 *
	 * Gets all database records with an order_by clause.
	 *
	 * USAGE:
	 *
	 * $order_by = 'id asc';
	 * or
	 * get('id asc');
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	public function get($order_by)
	{
		$data = array();

		$this->db->order_by($order_by);
		return $this->db->get($this->table);

	}

	// -----------------------------------------------------------------------

	/**
	 * get_with_limit()
	 *
	 * Gets the database records with limit, offset and order_by clause.
	 *
	 * USAGE:
	 *
	 * $limit = 10 - $offset = 0 - $order_by = 'id asc';
	 * or
	 * get_with_limit(10, 0, 'id asc');
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_with_limit($limit, $offset, $order_by)
	{
		$this->db->limit($limit, $offset);
		$this->db->order_by($order_by);

		return $this->db->get($this->table);
	}

	// -----------------------------------------------------------------------

	/**
	 * get_where()
	 *
	 * Gets the database record with a where clause.
	 *
	 * $where = array('id' => $id);
	 * or
	 * get_where(array('id' => $id));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_where($where)
	{
		$this->db->where($where);
		return $this->db->get($this->table);
	}

	// -----------------------------------------------------------------------

	/**
	 * get_by_category()
	 *
	 * Gets the database record with a where clause by category.
	 *
	 * $where = array('id' => $id);
	 * or
	 * get_where(array('id' => $id));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_by_category($cat_id)
	{
		$this->db->where('category_id', $cat_id);
		$this->db->where('status', 'published');

		return $this->db->get($this->table);
	}

	// -----------------------------------------------------------------------

	/**
	 * _insert()
	 *
	 * Inserts a new database record.
	 *
	 * $data - The data array of fields to insert in to the database table.
	 *
	 * USAGE:
	 *
	 * $data = array('name' => $name, 'email' => $email, 'url' => $url);
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _insert($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	// -----------------------------------------------------------------------

	/**
	 * _insert_string()
	 *
	 * Returns a correctly formatted SQL insert string.
	 *
	 * $data - The data array of fields to insert in to the database table.
	 *
	 * USAGE:
	 *
	 * $data = array('name' => $name, 'email' => $email, 'url' => $url);
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _insert_string($data)
	{
		return (string) $this->db->insert_string($this->table, $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * _update()
	 *
	 * Updates the database record with a where clause and the data.
	 *
	 * USAGE:
	 *
	 * $data = array('name' => $name, 'email' => $email, 'url' => $url);
	 * $where = array('id' => $id);
	 * or
	 * _update(array('id' => $id), array('name' => $name, 'email' => $email));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _update($where, $data)
	{
		$this->db->where($where);
		$this->db->update($this->table, $data);
	}

	// -----------------------------------------------------------------------

	/**
	 * _update_string()
	 *
	 * Returns a correctly formatted SQL update string.
	 *
	 * USAGE:
	 *
	 * $where = "author_id = 1 AND status = 'active'";
	 * $data  = array('name' => $name, 'email' => $email, 'url' => $url);
	 * or
	 * _update_string(array('id' => $id), array('name' => $name, 'email' => $email));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _update_string($where, $data)
	{
		return (string) $this->db->update_string($this->table, $data, $where);
	}

	// -----------------------------------------------------------------------

	/**
	 * _delete()
	 *
	 * Deletes the database record with a where clause.
	 *
	 * USAGE:
	 *
	 * $where = array('id' => $id);
	 * or
	 * _delete(array('id' => $id));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _delete($where)
	{
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	// -----------------------------------------------------------------------

	/**
	 * count_all()
	 *
	 * Returns a count of all the database table records.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	// -----------------------------------------------------------------------

	/**
	 * count_all_where()
	 *
	 * Returns the count of all where clause database records.
	 *
	 * USAGE:
	 *
	 * $where = array('id' => $id);
	 * or
	 * _count_all_where(array('id' => $id));
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function count_all_where($where)
	{
		$this->db->where($where);
		$query = $this->db->get($this->table);

		return $query->num_rows();
	}

	// -----------------------------------------------------------------------

	/**
	 * get_max()
	 *
	 * gets the database records by the max field secified.
	 *
	 * USAGE:
	 *
	 * $value = 'id';
	 * or
	 * get_max('id', 'name', 'etc');
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_max($value)
	{
		$this->db->select_max($value);
		$query = $this->db->get($this->table);

		$row = $query->row();
		return $row->id;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_last_query()
	 *
	 * Returns the last database query executed.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function get_last_query()
	{
		return $this->db->last_query();
	}

	// -----------------------------------------------------------------------

	/**
	 * _custom_query()
	 *
	 * MySQL custom direct query.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function _custom_query($mysql_query)
	{
		return $this->db->query($mysql_query);
	}

}	// End of Class.

/**
 * ------------------------------------------------------------------------
 * End of file MY_Model.php
 * Location: ./application/core/MY_Model.php
 * ------------------------------------------------------------------------
 */