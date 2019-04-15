<?php
include_once 'databaseinfo.php';
/*
  * escapes special characters in a string for use in an SQL statement
  * Escapes special characters from all inputs of the form
  * This prevents sql injection attack
*/	
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$message = mysqli_real_escape_string($con, $_POST['message']);
?>