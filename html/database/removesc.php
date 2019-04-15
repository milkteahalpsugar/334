<?php
if(isset($_GET['remove'])){
	$uid=$_GET['uid'];
	$bid=$_GET['bid'];
	require_once('../database/databaseinfo.php');
	$con = new mysqli($sn,$un,$pw,$db);
	$query = "DELETE FROM basket WHERE `bid` = '$bid' AND `uid`='$uid';";
	$result = $con->query($query);
	if($result){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	else{
		echo <<<ZZEOF
		<h1>Fail add to busket</h1>
ZZEOF;
		echo ("Error description: " . mysqli_error($con));
		echo <<<ZZEOF
		<a href="../../pages/admin.php"> go back to admin page</a>
ZZEOF;
	}
		
}

?>