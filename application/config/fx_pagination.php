<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor : phpDesigner 8.1.2
 * Date   : 10/19/2013
 * Time   : 11:01:42 PM
 * Author : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Config	FX Pagination	Config
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

/*
|--------------------------------------------------------------------------
| Pagination configuration items.
|--------------------------------------------------------------------------
|
| Description:
|
| Change default output to work with Twitter Bootstrap v3.0.0 styling.
|
|--------------------------------------------------------------------------
*/
$config['full_tag_open']   = '<div><ul class="pagination">';
$config['full_tag_close']  = '</ul></div><!-- pagination -->';

$config['first_link']      = 'First';
$config['first_tag_open']  = '<li class="prev page">';
$config['first_tag_close'] = '</li>';

$config['last_link']       = 'Last';
$config['last_tag_open']   = '<li class="next page">';
$config['last_tag_close']  = '</li>';

$config['next_link']       = 'Next &raquo';
$config['next_tag_open']   = '<li class="next page">';
$config['next_tag_close']  = '</li>';

$config['prev_link']       = '&laquo; Previous';
$config['prev_tag_open']   = '<li class="prev page">';
$config['prev_tag_close']  = '</li>';

$config['cur_tag_open']    = '<li class="active"><a href="">';
$config['cur_tag_close']   = '</a></li>';

$config['num_tag_open']    = '<li class="page">';
$config['num_tag_close']   = '</li>';


/**
 * ------------------------------------------------------------------------
 * End of file fx_pagination.php
 * Location: ./application/config/fx_pagination.php
 * ------------------------------------------------------------------------
 */