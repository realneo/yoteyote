<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------------
 * Created by phpDesigner 8.1.2
 * Date  : 8/17/2013
 * Time  : 6:28:14 AM
 * Author: Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Class	Backup	Controller
 *
 * ------------------------------------------------------------------------
 * @package		Package		Yoteyote
 * @subpackage	Subpackage	backup
 * @category	category	backup
 * @author		Raymond L King Sr.
 * @copyright	Copyright (c) 2009 - 2012, Custom Software Designers, LLC.
 * @link		http://www.example.com
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

class Backup extends Admin_Controller
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
	}

	// -----------------------------------------------------------------------

	/**
	 * db_backup()
	 *
	 * Method to backup the clients complete database / MySQL Only!.
	 *
	 * Usage:
	 *
	 * ./backups - directory in the root.
	 * Read and write for owner, nothing for everybody else chmod("/backups", 0600);
	 *
	 * $this->load->module('backup');
	 * $this->backup->db_backup();
	 *
	 * @access	public
	 * @return	boolean - TRUE - File written | FALSE - Unable to write the file.
	 */
    public function db_backup()
    {
    	// Load the DB utility class
		$this->load->dbutil();

		// Load the file helper
		$this->load->helper('file');

		// Setup a date for the database backup sql file.
		$db_date = date('m-d-Y');

		// Setup the preferences and backup the database.
		$prefs = array(
			'tables'      => array(),    // Array of tables to backup.
			'ignore'      => array(),    // List of tables to omit from the backup
			'format'      => 'txt',      // gzip, zip, txt
			'filename'    => '',         // File name - NEEDED ONLY WITH ZIP FILES
			'add_drop'    => TRUE,       // Whether to add DROP TABLE statements to backup file
			'add_insert'  => TRUE,       // Whether to add INSERT data to backup file
			'newline'     => "\n"        // Newline character used in backup file
		);

		// Backup the entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs);

		// Create the filename.
		$file_name = './backups/backup_'.$db_date.'.sql';

		// Write the new database file to the server.
		return (write_file($file_name, $backup)) ? TRUE : FALSE;
	 }

}	// End of Class.

/* ------------------------------------------------------------------------
 * Filename: backup.php
 * Location: ./application/modules/backup/controllers/backup.php
 * ------------------------------------------------------------------------
 */