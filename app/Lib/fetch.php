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
			
			require_once ('bucket_classes.php');
			require_once ('friends_classes.php');
			
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

			class fetch
			{
				private $helper;
				private $session;
				function fetch($app_id,$app_secret,$login_redirect)
				{
					
					session_start();
					$this->helper = new FacebookRedirectLoginHelper($login_redirect,'352984878216561','1c7c8eb2131c187699712a572bed0c45');
					FacebookSession::setDefaultApplication('352984878216561','1c7c8eb2131c187699712a572bed0c45');
					try 
					{
  						$this->session = $this->helper->getSessionFromRedirect();
  					
  						// var_dump($session);
					} 
					catch(FacebookRequestException $ex) 
					{
					} 
					catch(Exception $ex) 
					{
					}
					if ($this->session) 
					{
						//echo "working";
  						$_SESSION['fb_token'] = $this->session->getToken();
				
					}
			
					else
					{	
  						$loginUrl = $this->helper->getLoginUrl();
  						header("location:".$loginUrl);
  						exit;
					}
				}

				function fetch_session()
				{	
					return($this->session);
			
				}
				function fetch_profile($uid)
				{
			 		$request= (new FacebookRequest($this->session, 'GET', '/'.$uid ));
    		 		$response=$request->execute();
    		 		$object = $response->getGraphObject();
    		 		$graph_user = $response->getGraphObject(GraphUser::className());
    		 		return($graph_user);
				}
		function fetch_profile_pic($uid)
		{
			$request = new FacebookRequest(
      		$this->session,
      		'GET',
      		'/'.$uid.'/picture',
      		array (
      		'redirect' => false,
      		'height' => '150',
      		'type' => 'normal',
      		'width' => '150',
    	  	)

    		);
    		$response = $request->execute();
    		$graph_user_pic = $response->getGraphObject(GraphUser::className());
    		return($graph_user_pic);
		}
		
		function fetch_likes($uid)
		{
			$request = new FacebookRequest(
    		$this->session,
    		'GET',
    		'/'.$uid.'/likes'
    		);
    		$response = $request->execute();
    		$graphObject = $response->getGraphObject();
    		$likes=$graphObject->getProperty('data');
    		$likes_data=$likes->asArray();
    		$buckets = new Bathroom();
    		for ($index=0; $index<count($likes_data) ; $index++) 
    		{ 
    		  # code...
    		   $likes_item_category=print_r($likes_data[$index]->category,true); 
    		   $likes_item=print_r($likes_data[$index]->name,true);
    		   $buckets->add_bucket(new Bucket($likes_item_category,$likes_item),$likes_item_category);//$likes_item); 
    		   
    		   /* Set the KEY parameter as $likes_item_category for add_Bucket function to bucket the likes
    		   Or set it $index to list likes & categories & then use
     		   echo $index.' '.$buckets->get_bucket($index)->get_category().' '.$buck->get_item(0).'<br>';
    		   to view the list
    		   */
    		   
    		   //$buck=$buckets->get_bucket($index);
    		}
    		return($buckets);
		}

		function fetch_friends($uid)
		{
			$request = new FacebookRequest(
    		$this->session,
    		'GET',
    		'/'.$uid.'/friends'
    		);
    		$response = $request->execute();
    		$graphObject = $response->getGraphObject();
    		$friends=$graphObject->getProperty('data');
    		$friends_data=$friends->asArray();
   		 	$circle=new Circle();
   		 	for ($index=0; $index<count($friends_data) ; $index++) 
    		{ 
    		   $name=print_r($friends_data[$index]->name,true);
    		   $id=print_r($friends_data[$index]->id,true);
    		   $pic=$this->fetch_profile_pic($id)->getProperty('url');
    		   //echo '<br>'.$name." : ";
    		   //var_export($pic);
    		   $circle->add_friend(new friend($id,$name,$pic),0); //pass 0 as key
    		}
    		return($circle);
		}

			}	
?>