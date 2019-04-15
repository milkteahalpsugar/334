<?php
	echo "hello";
		include('../databaseinfo.php');
		$bname=$_GET['bookName'];
		$bid = $_GET['bookId'];
		$bauthor = $_GET['bookAuthor'];
		$bintro = $_GET['bookIntro'];
		$btype = $_GET['bookType'];
		$bprice = $_GET['bookPrice'];
		
		//get upload image
		if(isset($_GET["bookImage"])){
			$target_dir = "../../../picture/".$btype."/";
			$target_file = $target_dir . basename($_FILES["bookImage"]["name"]);
			move_uploaded_file($_FILES["bookImage"]["tmp_name"],"../../../picture/$btype/" . $_FILES["bookImage"]["name"]);	
			$bimage=$_FILES["bookImage"]["name"];
		}
		else{
			$bimage="#.jpg";
		}
		
		
		$query = "INSERT INTO `book` 
		(`bookId`, `bookName`, `bookAuthor`, `bookIntro`, `bookImage`, `bookType`, `bookPrice`) 
		VALUES ('$bid', '$bname', '$bauthor', '$bintro', '$bimage', '$btype', '$bprice');";
		$result = $con->query($query);
		
		
			echo $bname;
	
	
	
	header('location:../../pages/admin.php');
	
?>