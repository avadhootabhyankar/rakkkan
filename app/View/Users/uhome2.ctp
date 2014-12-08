<html>
	<body>
		<?php
			echo "<table><tr><td>";
    		echo '<br /><img src="'.$graph_user_pic->getProperty('url').'"/></td><td>';
    		echo '<br />First Name: '.$graph_user->getFirstName();
    		echo '<br />Last Name: '.$graph_user->getLastName();
    		echo '<br />Gender: '.$graph_user->getProperty('gender');
    		echo '<br />Profile Link: '.$graph_user->getLink();
            echo '<br />Profile Id: '.$graph_user->getId().'</td></table>';
            for($index=0;$index<$friends->length();$index++)
            {
                
                $friend=$friends->get_friend($index); //fetch 1 friends from friends
                
                $friend_id=$friend->get_id();
                $friend_name=$friend->get_name();
                $friend_pic=$friend->get_pic();
            
                 /* profile pic url in $graph_user_pic->getProperty('url') use as image src url */
                 echo '<tr valign="middle" ><td>';
                 echo '<br /><img src="'.$friend_pic.'"/></td><td>';
                 echo '</td><td >'.$friend_id;
                 echo ':'.$friend_name."</td></tr>";
               
        
            }
    		echo '<br>'.$logout_ret;
		?>
	</body>
</html>