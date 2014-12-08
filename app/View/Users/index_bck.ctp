<html>
	<body>
	
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
			session_start();

			FacebookSession::setDefaultApplication('352984878216561', '1c7c8eb2131c187699712a572bed0c45');
			$helper = new FacebookRedirectLoginHelper('http://localhost/rakkan/Users/uhome');
			$loginUrl = $helper->getLoginUrl(array('user_likes','user_friends','read_friendlists'));
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
					echo '<a href="'.$loginUrl.'"> LOGIN</a>';
				}
			}
		?>
	</body>
</html>
