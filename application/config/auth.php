<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ------------------------------------------------------------------------
 * Editor : phpDesigner 8.1.2
 * Date   : 10/17/2013
 * Time   : 1:08:25 PM
 * Author : Raymond L King Sr.
 * ------------------------------------------------------------------------
 *
 * Config	Name
 *
 * ------------------------------------------------------------------------
 * To change this template use File | Settings | File Templates.
 * ------------------------------------------------------------------------
 */

/*
|--------------------------------------------------------------------------
| Auth groups array
|--------------------------------------------------------------------------
|
| The array which holds your user groups and their ID.
| If you have a database table for groups, these ID's must be the same as in the database.
|
*/
$config['auth_groups'] = array(
	'admin'		=> '1',
	'owner'		=> '2',
	'moderator' => '3',
	'editor'	=> '4',
	'user'		=> '5',
);

/*
|--------------------------------------------------------------------------
| Cookie expire configuration times.
|--------------------------------------------------------------------------
|
| Description	: Setting the cookie expireration times.
|
|--------------------------------------------------------------------------
|
| seconds * minutes * hours * days + current time -  86400 = 1 day
| expiration time is set as (60 sec * 60 min * 24 hours * 30 days).
| 3600  = 1 hour,  so (3600 * number of hours).
| 7200  = 2 hours.
|
| 86400      = 1  day, so (86400 * number of days).
| 86400 * 30 = 30 days.
|
|--------------------------------------------------------------------------
*/
$config['login_expire']    = 3600;
$config['remember_expire'] = 86400 * 30;		// 30 days



/*
|--------------------------------------------------------------------------
| Name configuration items.
|--------------------------------------------------------------------------
|
| Description	:
|
|--------------------------------------------------------------------------
|
| Prototype:
|
|
|--------------------------------------------------------------------------
*/
//$config[''] = '';


/**
 * ------------------------------------------------------------------------
 * End of file security.php
 * Location: ./application/config/security.php
 * ------------------------------------------------------------------------
 */