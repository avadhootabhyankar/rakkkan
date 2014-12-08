
	
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
			//require_once ('bucket_classes.php');
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
			function login_script($app_id,$app_secret,$login_redirect,$permission_array,$login_tag)
			{
			session_start();

			FacebookSession::setDefaultApplication($app_id,$app_secret);
			$helper = new FacebookRedirectLoginHelper($login_redirect);
			$loginUrl = $helper->getLoginUrl($permission_array);
			if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) )
			{
				$session = new FacebookSession( $_SESSION['fb_token'] );
				header("Location:http://localhost/rakkan/Users/uhome");
				die();
			}
			else
			{
				try {
			  		$session = $helper->getSessionFromRedirect();
			  		
					} catch(FacebookRequestException $ex) {
			  		// When Facebook returns an error
					} catch(\Exception $ex) {
			  // When validation fails or other local issues
				}
				if (isset($session)) 
				{
 			 		// graph api request for user data
                 	$request = new FacebookRequest( $session, 'GET', '/me' );   
                 	$response = $request->execute();
                 		// get response
                 	$graphObject = $response->getGraphObject();

                 // print data
                 //echo  print_r( $graphObject, 1 );
                
				}
				else
				{
				//$session->delete('FB');
					//return ('<a href="'.$loginUrl.'">'.$login_tag.'</a>');
					return ('"'.$loginUrl.'"');
				}
			}
			}
			function logout_script($login_url_redirect,$logout_redirect,$session,$logout_tag)
			{
					$helper = new FacebookRedirectLoginHelper($login_url_redirect);
					return ('<a href="' . $helper->getLogoutUrl( $session, $logout_redirect ) . '">'.$logout_tag.'</a>');
			}
		?>
