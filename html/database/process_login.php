<?php
session_start();

// if customer hits login button
if (isset($_POST['submit'])) {

	// connect to database
	include_once 'databaseinfo.php';
	
	// if connection fails, display error
	if ($con->connect_error) {
    	die('Connect Error: ' . $con->connect_error);

    // get user entered information
	} else { 
		// get user entered info
		// by applying injection attack prevention first
		// injectionPrev1 prevents html injection attack
		include_once 'login_html_injection_prev.php';
		// escapes special characters in a string for use in an SQL statement
  		// Escapes special characters from all inputs of the form
  		// this prevents sql injection attack
		include_once 'login_sql_injection_prev.php';
		
		// check for empty fields
		if (empty($uid)||empty($pwd)) {
			include_once 'login_alerts/empty_fields.js';
		} else {
			$queryUsername = "SELECT * FROM users WHERE user_uid='$uid'";
			$queryPassword = "SELECT * FROM users WHERE user_uid='$uid' AND user_pwd='$pwd'";
	
			$resultUsername = $con->query($queryUsername);
			
			// if username does not exist in db
			if ($resultUsername->num_rows<1) { 
				include_once 'login_alerts/no_username.js';
			} elseif ($resultUsername->num_rows==1) {
				
				// if username exists in db, check password
				$resultPassword = $con->query($queryPassword);
				
				// if password does not match	
				if ($resultPassword->num_rows<1) {
					// auto repopulate username
					include_once '../pages/formAutoRepop.php';
					
				// if password matches
				} elseif ($resultPassword->num_rows==1) { 
					
					// check if user is admin
					if (($uid==admin1)||($uid==admin2)) {
						$_SESSION['username'] = $uid;
						$_SESSION['password'] = $pwd;
						$_SESSION['iflogin']=true;
						include_once 'login_alerts/admin.js';
						
					// log in as user if not admin
					} else { 
						$_SESSION['username'] = $uid;
						$_SESSION['password'] = $pwd;
						$_SESSION['iflogin']=true;
						include_once 'login_alerts/user.js';
					}
				}
			}
		}
	} 
} else {
	
	// if visiting url but didn't submit login information
	header("Location: ../pages/login.html");
	exit();
}

?>