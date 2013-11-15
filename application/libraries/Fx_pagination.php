<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * FX Pagination Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Pagination
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/libraries/pagination.html
 */
class Fx_pagination {

	public $base_url			  = '';						// The page we are linking to
	public $prefix				  = '';						// A custom prefix added to the path.
	public $suffix				  = '';						// A custom suffix added to the path.

	public $total_rows			  =  0;						// Total number of items (database results)
	public $per_page			  = 10;						// Max number of items you want shown per page
	public $num_links			  =  2;						// Number of "digit" links to show before/after the currently viewed page
	public $cur_page			  =  0;						// The current page being viewed
	public $use_page_numbers	  = FALSE;					// Use page number for segment instead of offset

	public $info_tag_open         = '<li>';
	public $info_tag_close        = '</li>';

	public $first_link			  = '&lsaquo; First';
	public $next_link			  = '&gt;';
	public $prev_link			  = '&lt;';
	public $last_link			  = 'Last &rsaquo;';
	public $uri_segment			  = 3;
	public $full_tag_open		  = '';
	public $full_tag_close		  = '';
	public $first_tag_open		  = '';
	public $first_tag_close		  = '&nbsp;';
	public $last_tag_open		  = '&nbsp;';
	public $last_tag_close		  = '';
	public $first_url			  = '';						// Alternative URL for the First Page.
	public $cur_tag_open		  = '&nbsp;<strong>';
	public $cur_tag_close		  = '</strong>';
	public $next_tag_open		  = '&nbsp;';
	public $next_tag_close		  = '&nbsp;';
	public $prev_tag_open		  = '&nbsp;';
	public $prev_tag_close		  = '';
	public $num_tag_open		  = '&nbsp;';
	public $num_tag_close		  = '';
	public $page_query_string	  = FALSE;
	public $query_string_segment = 'per_page';
	public $display_pages		  = TRUE;
	public $anchor_class		  = '';

	// Added By Tohin
	public $js_rebind			  = '';
	public $div					  = '';
	public $post_var			  = '';
	public $additional_param	  = '';

	// Added by Sean
	public $show_count			  = TRUE;

	// -----------------------------------------------------------------------

	/**
	 * Constructor
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 */
	public function __construct($params = array())
	{
		if (count($params) > 0)
		{
			$this->initialize($params);
		}

		if ($this->anchor_class != '')
		{
			$this->anchor_class = 'class="'.$this->anchor_class.'" ';
		}

		log_message('debug', "Pagination Class Initialized");
	}

	// -----------------------------------------------------------------------

	/**
	 * Initialize Preferences
	 *
	 * @access	public
	 * @param	array	initialization parameters
	 * @return	void
	 */
	public function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// -----------------------------------------------------------------------

	/**
	 * Generate the pagination links
	 *
	 * @access	public
	 * @return	string
	 */
	public function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Set the base page index for starting page number
		if ($this->use_page_numbers)
		{
			$base_page = 1;
		}
		else
		{
			$base_page = 0;
		}

		// Determine the current page number.
		$_ci =& get_instance();

		if ($_ci->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			if ($_ci->input->get($this->query_string_segment) != $base_page)
			{
				$this->cur_page = $_ci->input->get($this->query_string_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}
		else
		{
			if ($_ci->uri->segment($this->uri_segment) != $base_page)
			{
				$this->cur_page = $_ci->uri->segment($this->uri_segment);

				// Prep the current page - no funny business!
				$this->cur_page = (int) $this->cur_page;
			}
		}

		// Set current page to 1 if using page numbers instead of offset
		if ($this->use_page_numbers AND $this->cur_page == 0)
		{
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page
		if ($this->use_page_numbers)
		{
			if ($this->cur_page > $num_pages)
			{
				$this->cur_page = $num_pages;
			}
		}
		else
		{
			if ($this->cur_page > $this->total_rows)
			{
				$this->cur_page = ($num_pages - 1) * $this->per_page;
			}
		}

		$uri_page_number = $this->cur_page;

		if ( ! $this->use_page_numbers)
		{
			$this->cur_page = floor(($this->cur_page / $this->per_page) + 1);
		}

		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		if ($_ci->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
		{
			$this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
		}
		else
		{
			$this->base_url = rtrim($this->base_url, '/').'/';
		}

		// And here we go...
		$output = '';

		// SHOWING LINKS
		if ($this->show_count)
		{
			$curr_offset = $_ci->uri->segment($this->uri_segment);

			$info = 'Page(s) : '.($curr_offset + 1).' to ';

			if (($curr_offset + $this->per_page) < ($this->total_rows -1))
			{
				$info .= $curr_offset + $this->per_page;
			}
			else
			{
				$info .= $this->total_rows;
			}

			$info .= '&nbsp;&nbsp; | &nbsp;&nbsp;Total pages : '.$this->total_rows.'&nbsp;&nbsp;';

			$output .= $this->info_tag_open.'<a '.$this->anchor_class.'href="#">'.$info.'</a>'.$this->info_tag_close;
		}

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;

			$output .= $this->first_tag_open.$this->get_ajax_link('', $this->first_link).$this->first_tag_close;
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			if ($this->use_page_numbers)
			{
				$i = $uri_page_number - 1;
			}
			else
			{
				$i = $uri_page_number - $this->per_page;
			}

			if ($i == 0 && $this->first_url != '')
			{
				$output .= $this->prev_tag_open.$this->get_ajax_link($i, $this->prev_link).$this->prev_tag_close;
			}
			else
			{
				$i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;

				$output .= $this->prev_tag_open.$this->get_ajax_link($i, $this->prev_link).$this->prev_tag_close;
			}

		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				if ($this->use_page_numbers)
				{
					$i = $loop;
				}
				else
				{
					$i = ($loop * $this->per_page) - $this->per_page;
				}

				if ($i >= $base_page)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$n = ($i == $base_page) ? '' : $i;

						if ($n == '' && $this->first_url != '')
						{
							$output .= $this->num_tag_open.$this->get_ajax_link($n, $loop).$this->num_tag_close;
						}
						else
						{
							$n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;

							$output .= $this->num_tag_open.$this->get_ajax_link($n, $loop).$this->num_tag_close;
						}
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			if ($this->use_page_numbers)
			{
				$i = $this->cur_page + 1;
			}
			else
			{
				$i = ($this->cur_page * $this->per_page);
			}

			$output .= $this->next_tag_open.$this->get_ajax_link($this->cur_page * $this->per_page , $this->next_link).$this->next_tag_close;
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			if ($this->use_page_numbers)
			{
				$i = $num_pages;
			}
			else
			{
				$i = (($num_pages * $this->per_page) - $this->per_page);
			}

			$output .= $this->last_tag_open.$this->get_ajax_link($i, $this->last_link).$this->last_tag_close;
		}

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}

	// -----------------------------------------------------------------------

	/**
	 * get_ajax_link()
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function get_ajax_link($count, $text)
	{
        if ($this->div == '')
        {
            return '<a href="'.$this->anchor_class.' '.$this->base_url.$count.'">'.$text.'</a>';
        }

        if ($this->additional_param == '')
        {
        	$this->additional_param = "{'t' : 't'}";
       	}

		return "<a href=\"#\"
			".$this->anchor_class."onclick=\"$.post('".$this->base_url.$count."', ".$this->additional_param.", function(data){
			$('".$this->div."').html(data);".$this->js_rebind."; }); return false;\">".$text.'</a>';
	}

}	// END Fx_Pagination Class


/**
 * ------------------------------------------------------------------------
 * End of file Fx_pagination.php
 * Location: ./application/libraries/Fx_pagination.php
 * ------------------------------------------------------------------------
 */