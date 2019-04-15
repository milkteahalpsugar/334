<?php
if(isset($_POST["submit"])) {
	include('../database/databaseinfo.php');
	$bname=$_POST['bookName'];
	$bid = $_POST['bookId'];
	$bauthor = $_POST['bookAuthor'];
	$bintro = $_POST['bookIntro'];
	$btype = $_POST['bookType'];
	$bprice = $_POST['bookPrice'];

	$target_dir = "../../picture/$btype/";
	$target_file = $target_dir . basename($_FILES["Upload"]["name"]);
	// if image file is successfully upload
	if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) {
        $bimage = basename( $_FILES["Upload"]["name"]);
    } else {
        $bimage="#.jpg";
    }

	$query = "INSERT INTO book
	(`bookId`, `bookName`, `bookAuthor`, `bookIntro`, `bookImage`, `bookType`, `bookPrice`) 
	VALUES ('$bid', '$bname', '$bauthor', (\"$bintro\"), '$bimage', '$btype', '$bprice');";
	echo $query;
	$result = $con->query($query);
	if(!$result){
		
		echo <<<ZZEOF
		<h1> Fail adding the book </h1>
ZZEOF;
		echo ("Error description: " . mysqli_error($con));
		echo <<<ZZEOF
		<a href="admin.php"> go back to admin page</a>
ZZEOF;
		
	}
	else{
		header('location:admin.php');
	}
	
}
?>