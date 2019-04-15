<?
/*
   strips a string from HTML, XML, and PHP tags
   to prevent html injection attack
*/	
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	
	//remove html tags from the form submitted	
	strip_tags($email);
	strip_tags($password);
	strip_tags($username);
	strip_tags($firstname);
	strip_tags($lastname);
	
?>