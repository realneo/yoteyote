<?php
    session_start();
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require_once('plugins/facebook-php-sdk-v4-4-2.0-dev/autoload.php');
    
    use Facebook\FacebookSession;
    use Facebook\FacebookRequest;
    use Facebook\FacebookResponse;
    use Facebook\FacebookSDKException;
    use Facebook\FacebookAuthorizationException;
    use Facebook\GraphUser;
    use Facebook\GraphObject;
    use Facebook\GraphSessionInfo;
    use Facebook\FacebookRequestException;
    use Facebook\FacebookRedirectLoginHelper;
    use Facebook\FacebookJavaScriptLoginHelp;
    use Facebook\FacebookCanvasLoginHelper;
    
    // Facebook app settings
    $app_id = '1547531755460936';
    $app_secret = '8d66d6e17ace837104273f82566af02f';
    $redirect_uri = 'http://localhost:8888/yoteyote/test.php';
    $redirect_uri2 = 'http://localhost:8888/yoteyote/test2.php';

    
    FacebookSession::setDefaultApplication($app_id, $app_secret);
    
    $helper = new FacebookRedirectLoginHelper($redirect_uri);
    
    $session = $helper->getSessionFromRedirect();
    
    if(isset($_SESSION['fb_token'])){
	$session = new FacebookSession($_SESSION['fb_token']);
    }
    
    if(isset($session)){
	$_SESSION['fb_token'] = $session->getToken();
	echo "Logged In";
	echo "<br />";
	echo "<a href='". $helper->getLogoutUrl($session, $redirect_uri2) ."'>Logout</a>";
	$request = new FacebookRequest($session, 'GET', '/me');
	$response = $request->execute();
	
	echo "<br />";
	
	$graph = $response->getGraphObject(GraphUser::className());

	echo $graph->getFirstName();
	
    }else{
	echo "<a href='". $helper->getLoginUrl() ."'>Login with Facebook</a>";
    }

    echo "<hr />";
    
    
    echo "<pre>";
    print_r($graph);
    echo "</pre>";
?>