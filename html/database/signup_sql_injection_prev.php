<?php
include_once 'databaseinfo.php';
/*
  * escapes special characters in a string for use in an SQL statement
  * Escapes special characters from all inputs of the form
  * This prevents sql injection attack

*/	
$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$username = mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

?>