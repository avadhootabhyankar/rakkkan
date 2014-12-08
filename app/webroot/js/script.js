		
		window.onkeyup = function (event) 
		{
			if (event.keyCode == 27) 
			{
				document.getElementById("login-popup").className="art-transparent-block display-none";
				document.getElementById("signup-popup").className="art-transparent-block display-none";
			}
		}
				
		function display_login()
		{
			document.getElementById("login-popup").className="art-transparent-block";
		}
		function close_login_popup()
		{
			document.getElementById("login-popup").className="art-transparent-block display-none";
		}
		
		function display_signup()
		{
			document.getElementById("signup-popup").className="art-transparent-block";
		}
		function close_signup_popup()
		{
			document.getElementById("signup-popup").className="art-transparent-block display-none";
		}
		function display_searchoption()
		{
			document.getElementById("search-option").className="art-transparent-block";
		}
		function close_searchoption()
		{
			document.getElementById("search-option").className="art-transparent-block display-none";
		}
		