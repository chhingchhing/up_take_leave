<?php
require_once('application/connection/config.php');
require_once('application/models/system.php');
require_once('application/models/system.php');

class System extends System_mod {

	function login_system($email, $passwd) {
		$ExecutedLogin = $this->connect($email, $passwd);
		//this is condition for num rows
		if (mysql_num_rows($ExecutedLogin) > 0) {
			while ($GetingRow = mysql_fetch_array($ExecutedLogin)) {
				$_SESSION['logged_id'] = $GetingRow["user_id"]; //create user logged session
				$_SESSION['full_name'] = strtoupper($GetingRow["last_name"]).' '.ucfirst($GetingRow["first_name"]); //create user fullname logged session
			}

			header('Location: '.$_SERVER['PHP_SELF']);
			// header("location:application/apps.php"); //this is redirect to control panel
		} else {
			// echo "Invalid username or password provided."; die();
			$_SESSION['msg_error'] = "<p style='color:red;'>Invalid username and password!</p>"; //this is variable for create session
			header("location:index.php"); //this is redirect to login page
		}
	}

	// Logout will destroy all session of user
	function logout_system() {
		session_destroy();
	}

	// Load include the file view
	function load_page($path)
	{
		return include($path.".php");
	}

}


if (isset($_POST['btnSignIn'])) {
	$email = $_POST['email'];
	$passwd = $_POST['password'];

	$sys = new System;
	$sys->login_system($email, $passwd);
}