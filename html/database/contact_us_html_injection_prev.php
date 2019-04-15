<?
/*
   strips a string from HTML, XML, and PHP tags
   to prevent html injection attack
*/	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	
	//remove html tags from the form submitted	
	strip_tags($name);
	strip_tags($email);
	strip_tags($message);
	
?>
			