<?php
session_start();
	
	// if user hits 'SEND MESSAGE' button
	if (isset($_POST['submit'])) {

		// connect to database
		include_once 'databaseinfo.php';

		// if connection fails:
		if ($con->connect_error) {
    		die('Connect Error: ' . $con->connect_error);
		} else {

			// if connection works, get user-entered information
			// first apply injection attack prevention 
			include_once 'contact_us_sql_injection_prev.php';
			include_once 'contact_us_html_injection_prev.php';
			
			//check if email is invalid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				include_once 'signup_alerts/invalid_email.js';
			} else {

				// admin's email address
				$to = "khandak1@uwindsor.ca";

				// formatting the email sent to admin
				$subject = "New email from Sahara Customer";
				$body = "Name: ".$name."\n"."wrote: "."\n\n".$message;
				$headers = "From: ".$email;

				// if mail is sent
				if(mail($to, $subject, $message, $headers)){
				
					// if success, pop up message
					echo '<script type="text/javascript">
					alert("Sent successfully! We will contact you shortly!");
					window.location.href="../../homepage.php";
					</script>';
				} else {

					// pop up error message
					echo '<script type="text/javascript">
					alert("Email was not sent! Please try again!");
					window.location.href="contact_us.php";
					</script>';
				}
			}
		}
	} else {
		// if visiting page, not does not submit
		header("Location: ../pages/contact_us.php");
	}
?>