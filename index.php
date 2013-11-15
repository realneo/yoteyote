<?php

	// ------------------------------------------------------------------------

	/*
	|--------------------------------------------------------------------------
	| Docment root folders
	|--------------------------------------------------------------------------
	|
	| These constants use existing location information to work out web root, etc.
	|
	| These are used in ./includes/functions.php for base_url, site_url and redirect.
	|
	*/

	// Base URL
	if (isset($_SERVER['HTTP_HOST']))
	{
		$base_url  = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ? 'https' : 'http';
		$base_url .= '://'. $_SERVER['HTTP_HOST'];
		$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

		// Base URI (It's different to base URL!)
		$base_uri = parse_url($base_url, PHP_URL_PATH);

		if (substr($base_uri, 0, 1) != '/') $base_uri = '/'.$base_uri;
		if (substr($base_uri, -1, 1) != '/') $base_uri .= '/';
	}
	else
	{
		$base_url = 'http://localhost/';
		$base_uri = '/';
	}

	// Define these values to be used later on
	define('BASE_URL', $base_url);
	define('BASE_URI', $base_uri);

	// We dont need these variables any more
	unset($base_uri, $base_url);

	// -----------------------------------------------------------------------

	/**
	 * Application specific code here!
	 */

	// Application global functions/methods.
    include('includes/functions.php');

    include('header.php');
    include('menu_bar.php');
    include('main_content.php');
    //include('includes/profile.php');

?>

<div id='bottom_content'>

<div id='user'>

<?php

    if ($user_id == false)
	{
        echo "<p style='padding:15px' class='red_color'>Sign Up or Sign In to GET Full Access of the Yoteyote Features";
    }
	else
	{
        include('includes/logged_user.php');
    }
?>

</div> <!-- user -->