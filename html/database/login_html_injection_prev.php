<?
/*
   strips a string from HTML, XML, and PHP tags
   to prevent html injection attack
*/	
	$uid = $_POST['username'];
	$pwd = $_POST['password'];
	
	//remove html tags from the form submitted	
	strip_tags($password);
	strip_tags($username);
	
?>