<?php

class LoginController extends AppController{
	public $helpers = array('Html', 'Form');
   // var $uses = array('User', 'Wishlist');

    public function index() {
        require_once ('../Lib/login.php');
		$permisson_array=array('user_likes','user_friends','read_friendlists'); // add more permissions if you need
		login('352984878216561','1c7c8eb2131c187699712a572bed0c45','http://localhost/rakkan/Users/uhome',$permisson_array,'LOGIN');
		/*
			function login($app_id,$app_seceret,$login_url_redirect,$permission_array,$login_tag)
			$login_tag can be replaced with your tag like text other image, pass html tag for it.

		*/
    }
}