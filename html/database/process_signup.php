<?php
session_start();

// if visitor hits the submit button
if (isset($_POST['submit'])) {
	
	// connect to database
	include_once 'databaseinfo.php';

	// get user entered info
	// by applying injection attack prevention first
	// injectionPrev1 prevents html injection attack
	include_once 'signup_html_injection_prev.php';
	// escapes special characters in a string for use in an SQL statement
  	// Escapes special characters from all inputs of the form
  	// this prevents sql injection attack
	include_once 'signup_sql_injection_prev.php';

	
	// check for empty fields 
	if ((empty($firstname))||(empty($lastname))||(empty($email))||(empty($username))||(empty($password))) {
		include_once 'signup_alerts/empty_fields.js';
	} else {

		//check for invalid characters 
		if ((!preg_match("/^[a-zA-Z]*$/", $firstname)) || (!preg_match("/^[a-zA-Z]*$/", $lastname))) {
			include_once 'signup_alerts/invalid_chars.js';
		} else {

			//check if email is invalid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				include_once 'signup_alerts/invalid_email.js';
			} else {

				// check if username is taken 
				$sql = "SELECT * FROM users WHERE user_uid='$username'";
				$result = mysqli_query($con, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck>0) {
					// display error message
					include_once '../pages/formAutoRepop_signup.php';
				} else {

					// if no errors found, hash the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					
					// store user information in database
					$sql = "INSERT INTO users (user_uid, user_first, user_last, user_email, user_pwd) VALUES ('$username', '$firstname', '$lastname', '$email', '$hashedPwd');";
					
					// if sign up successful
					$result=mysqli_query($con, $sql);
					if($result){
						include_once 'signup_alerts/signup_success.js';

					} else {

						// if sign up fails, display error message
						include_once 'signup_alerts/signup_failed.js';
					}
				}
			}
		}
	}
	
} else { 

	// if visiting url but does not submit
	header("Location: ../pages/signup.html");
	exit();
}

