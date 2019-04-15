<?php
	$bid=$_GET["bid"];
	
	require_once('../databaseinfo.php');
	if(isset($_GET['intro'])){
		
		if(isset($_GET['bintro'])){
			
			$bintro=$_GET["bintro"];
			$query = "UPDATE book SET `bookIntro`=(\"$bintro\") WHERE `bookId` = '$bid';";
			
		}
	}
	
	 if(isset($_GET["price"])){
			
			$bprice=$_GET["bprice"];
			if(is_numeric($bprice)){
				
				$query = "UPDATE book SET `bookPrice`='$bprice' WHERE `bookId` = '$bid';";
			}
		}
		
	$result = $con->query($query);

	
	
	header('location:../../pages/changeprice.php?bid='.$bid);
?>