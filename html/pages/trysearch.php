<?php
	require_once('../database/databaseinfo.php');
	
	$query = "SELECT * FROM book
			WHERE `bookName` LIKE '%$input%' 
			OR `bookId` LIKE '%$input%' 
			OR `bookAuthor` LIKE '%$input%'
			OR `bookIntro` LIKE '%$input%';";
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
	$con->close();
?>
