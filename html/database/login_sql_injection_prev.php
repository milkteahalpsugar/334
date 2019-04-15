<?php
include_once 'databaseinfo.php';
/*
  * escapes special characters in a string for use in an SQL statement
  * Escapes special characters from all inputs of the form
  * This prevents sql injection attack

*/	
$uid = mysqli_real_escape_string($con, $_POST['username']);
$pwd = mysqli_real_escape_string($con, $_POST['password']);

?>