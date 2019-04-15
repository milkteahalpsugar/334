<?php
if(isset($_GET['add'])){
	$add=$_GET['add'];
	$uid=$_GET['uid'];
	$bid=$_GET['bid'];
	require_once('../database/databaseinfo.php');
	$con = new mysqli($sn,$un,$pw,$db);
	$query = "SELECT * FROM basket WHERE `bid` = '$bid' AND `uid`='$uid';";
	$result = $con->query($query);
	if($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$count = $row['count'];
		if($add=="add"){
			$count=$count+1;
		}
		else{
			$count=$count-1;
		}
		$query = "UPDATE basket SET `count`='$count' WHERE `bid` = '$bid' AND `uid`='$uid';";
	}
	else{
		$query = "INSERT INTO `basket` (`uid`, `bid`, `count`) VALUES ('$uid', '$bid', '1');";
	}
	
	$resulta = $con->query($query);
	if($resulta){
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