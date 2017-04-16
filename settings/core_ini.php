<?php
	//Start session
	session_start();

	//Check for login and permission

	function verify_userlogin()
	{
		if(isset($_SESSION['userid']) && !empty($_SESSION['userid']))
		{
			//valid
		}else
		{
			//Redirect to the login page
			header('Location:login/login.php');
		}
	}

	function getUserheader()
	{
		# code...
	}


?>