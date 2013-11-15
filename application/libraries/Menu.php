<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Wrapper library to the Menu model which provides implementation of a
 * dynamic tree-based menu with entries and their parents.
 *
 * @author		Liran Tal <liran.tal@gmail.com>
 * @package		daloRADIUS
 * @subpackage	Menu Navigation module for CodeIgniter
 * @copyright	GPLv2
 *
 */
class Menu {

    private $_ci;               // for CodeIgniter Super Global Reference.

    private $p_sans_p           = 'class=""';
    private $p_avec_p           = 'class="dropdown"';

    private $e_avec_p           = 'class="dropdown-submenu"';
    private $e_sans_p           = '';

    private $p_lien_e           = 'class="dropdown-toggle" data-toggle="dropdown"';


    // --------------------------------------------------------------------

    /**
     * PHP5        Constructor
     *
     */
    function __construct()
    {
        $this->_ci = get_instance();    // get a reference to CodeIgniter.
    }

    // --------------------------------------------------------------------

    /**
     * build_menu($table, $type)
     *
     * Description:
     *
     * builds the Dynaminc dropdown menu
     * $table allows for passing in a MySQL table name for different menu tables.
     * $type is for the type of menu to display ie; topmenu, mainmenu, sidebar menu
     * or a footer menu.
     *
     * @param    string    the MySQL database table name.
     * @param    string    the type of menu to display.
     * @return    string    $html_out using CodeIgniter achor tags.
     */
    function build_menu()
    {
        $table = "menu";
        $menu = array();

        // use active record database to get the menu.

		$this->_ci->db->order_by('title', 'asc');
		$query = $this->_ci->db->get($table);

        if ($query->num_rows() > 0)
        {
            // `id`, `title`, `link_type`, `page_id`, `icon`, `url`, `uri`, `dyn_group_id`, `position`, `target`, `parent_id`, `show_menu`
            $k  = 1;
            foreach ($query->result() as $row)
            {
                $menu[$k]['id']           = $row->id;
                $menu[$k]['title']        = $row->title;
                $menu[$k]['target']       = $row->link_type;
                $menu[$k]['page']         = $row->page_id;
                //$menu[$row->id]['icon']         = $row->icon;
                $menu[$k]['url']          = $row->url;
                $menu[$k]['uri']          = $row->uri;
                $menu[$k]['icon']         = $row->icon;
                $menu[$k]['position']     = $row->position;
                $menu[$k]['target']       = $row->target;
                $menu[$k]['parent']       = $row->parent_id;
                $menu[$k]['is_parent']    = $row->is_parent;
                $menu[$k]['show']         = $row->show_menu;
                /*
                $menu[$row->id]['id']           = $row->id;
                $menu[$row->id]['title']        = $row->title;
                $menu[$row->id]['target']       = $row->link_type;
                $menu[$row->id]['page']         = $row->page_id;
                //$menu[$row->id]['icon']         = $row->icon;
                $menu[$row->id]['url']          = $row->url;
                $menu[$row->id]['uri']          = $row->uri;
                $menu[$row->id]['icon']         = $row->icon;
                $menu[$row->id]['position']     = $row->position;
                $menu[$row->id]['target']       = $row->target;
                $menu[$row->id]['parent']       = $row->parent_id;
                $menu[$row->id]['is_parent']    = $row->is_parent;
                $menu[$row->id]['show']         = $row->show_menu;

                 */
                $k++;
            }
        }

        $query->free_result();    // The query result object will no longer be available

        // ----------------------------------------------------------------------

        // now we will build the dynamic menus.

        $html_out  = "";

        /**
         * check $type for the type of menu to display.
         *
         * ( 0 = top menu ) ( 1 = horizontal ) ( 2 = vertical ) ( 3 = footer menu ).
         */
        // return $menu;

        //$count = count($menu);
        //for ($i = 0; $i < $count; $i++) {

        // loop through the $menu array() and build the parent menus.
        for ($i = 1; $i <= count($menu); $i++)
        {
            if (is_array($menu[$i]))    // must be by construction but let's keep the errors home
            {
           	    // are we allowed to see this menu?
                if ($menu[$i]['show'] && $menu[$i]['parent'] == 0)
                {
                    //debut de ligne
                    //$html_out .= ''."";
                    if ($menu[$i]['is_parent'] == TRUE)
                    {
                        // CodeIgniter's anchor(uri segments, text, attributes) tag.
                        $html_out .= "<li ".$this->p_avec_p.">".anchor("javascript:;", '<i class="'.$menu[$i]['icon'].'"></i><span>'.$menu[$i]['title'].'</span><b class="caret"></b>',$this->p_lien_e);
                    }
                    else
                    {
                        $html_out .= "<li ".$this->p_sans_p.">".anchor($menu[$i]['url'],'<i class="'.$menu[$i]['icon'].'"></i><span>'.$menu[$i]['title'].'</span>');

                    }

                    // loop through and build all the child sub-menus.
                    $html_out .= $this->get_children($menu, $menu[$i]['id']);

                    //a chaque fin de ligne
                    $html_out .= '</li>'."\n";
                }
            }
            else
            {
                exit (sprintf('menu nr %s must be an array', $i));
            }
        }

        $html_out .= "".'' . "";

        return $html_out;
    }
     // --------------------------------------------------------------------

    /**
     * get_children($menu, $parent_id) - SEE Above Method.
     *
     * Description:
     *
     * Builds all child sub-menus using a recurse method call.
     *
     * @param    mixed     $menu    array()
     * @param    string    $parent_id    id of parent calling this method.
     * @return    mixed    $html_out if has subcats else FALSE
     */
    function get_children($menu, $parent_id)
    {
        $has_subcats = TRUE;

        $html_out  = '<ul class="dropdown-menu">';
        $html_out .= "".''."";
        $html_out .= "".''."";

        for ($i = 1; $i <= count($menu); $i++)
        {
       	    // are we allowed to see this menu?
            if ($menu[$i]['show'] && $menu[$i]['parent'] == $parent_id)
            {
                $has_subcats = TRUE;

                if ($menu[$i]['is_parent'] == TRUE)
                {

                    $html_out .= "<li ".$this->e_avec_p.">".anchor('javascript:;', ''.$menu[$i]['title']).'';
                }
                else
                {
                    $html_out .= "<li ".$this->e_sans_p.">".anchor($menu[$i]['url'], ''.$menu[$i]['title']).'';
                }

                // Recurse call to get more child sub-menus.
                $html_out .= $this->get_children($menu, $menu[$i]['id']);

                $html_out .= '</li>' . "\n";
            }
        }

        $html_out .= "</ul>".'' . "";

        return ($has_subcats) ? $html_out : FALSE;
    }

}	// End of Menu Library Class.

// ------------------------------------------------------------------------
/* End of file Menu.php */
/* Location: ../application/libraries/Menu.php */