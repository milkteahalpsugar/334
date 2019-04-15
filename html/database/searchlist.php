<?php
	if(isset($_POST["search"])){
	$bookname=$_POST["search"];
	}
	else{
		$bookname="";
	}
	require_once('databaseinfo.php');
	
	$query = "SELECT * FROM book
			WHERE `bookName` LIKE '%$bookname%' 
			OR `bookId` LIKE '%$bookname%' 
			OR `bookAuthor` LIKE '%$bookname%'
			OR `bookIntro` LIKE '%$bookname%';";
	$result = $con->query($query);
	if ($result->num_rows > 0) {
	// output data of each row
		while($row = $result->fetch_assoc()) {
			$bname = $row['bookName'];
			$bid = $row['bookId'];
			$bauthor = $row['bookAuthor'];
			$bintro = $row['bookIntro'];
			$bimage = $row['bookImage'];
			$btype = $row['bookType'];
			$bprice = $row['bookPrice'];
			
			echo <<<ZZEOF
			<div class="inproduct">
			<img src="../../picture/$btype/$bimage" >
				<a href= product.php?id=$bid>
				<h3>$bname</h3></a>
				$$bprice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ZZEOF;
			if(isset($uid)){
				echo <<<ZZEOF
				<a href="../database/addsc.php?add=add&bid=$bid&uid=$uid"
				style="background-color: #f44336;
					color: white;
					padding: 7px 15px;
					text-align: center;
					text-decoration: none;
					display: inline-block;">add</a>
			</div>
ZZEOF;
			}

		}
		
	}
	else {
		echo "No result";
	}
	$con->close();


?>
