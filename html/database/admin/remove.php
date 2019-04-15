<?php
	$bid=$_GET["bid"];
	require_once('../databaseinfo.php');
	$con = new mysqli($sn,$un,$pw,$db);
	$query = "DELETE FROM book WHERE `bookId` = '$bid';";
	$result = $con->query($query);
	mysqli_close($con);
	header('location:../../pages/admin.php');

?>
