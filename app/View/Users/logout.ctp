<?php
	require_once ('../Lib/Facebook/FacebookResponse.php');
	require_once ('../Lib/Facebook/FacebookRequest.php');
	require_once ('../Lib/Facebook/FacebookSession.php');
	require_once ('../Lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once ('../Lib/Facebook/GraphObject.php');
	require_once ('../Lib/Facebook/GraphUser.php');
	require_once ('../Lib/Facebook/GraphLocation.php');
	require_once ('../Lib/Facebook/GraphSessionInfo.php');
	require_once ('../Lib/Facebook/FacebookSDKException.php');
	require_once ('../Lib/Facebook/FacebookRequestException.php');
	require_once ('../Lib/Facebook/Entities/AccessToken.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookStream.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookStreamHttpClient.php');
	require_once ('../Lib/Facebook/FacebookAuthorizationException.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookCurl.php');
	require_once ('../Lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
	use Facebook\FacebookResponse;
	use Facebook\FacebookRequest;
	use Facebook\FacebookSession;   
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphLocation;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\Entities\AccessToken;
	use Facebook\HttpClients\FacebookHttpable;
	use Facebook\HttpClients\FacebookCurl;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	session_start();	
	FacebookSession::setDefaultApplication('352984878216561', '1c7c8eb2131c187699712a572bed0c45');
			//unset($_SESSION['fb_token']);
			$session = new FacebookSession( $_SESSION['fb_token'] );
			session_unset(); 

			// destroy the session 
			session_destroy(); 
			header("Location:http://localhost/rakkan/Users");
			die();
	
?>
