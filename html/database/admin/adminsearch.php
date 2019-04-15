<?php
	if(isset($_POST["search"])){
	$bookname=$_POST["search"];
	}
	else{
		$bookname="";
	}
	require_once('../databaseinfo.php');
	
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
					<p class="title">$bname</p>
ZZEOF;
?>
					<th><?php echo $bname ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </th>		
					<th><a class="remove" href="../database/admin/remove.php?bid=<?php echo $bid;?>" onclick="javascript: return confirm('Are you SURE you wish to do this?');">(-)remove&nbsp;&nbsp;</a></th>
					<th><a id="modify" href="changeprice.php?bid=<?php echo $bid; ?>">&nbsp;&nbsp;(/)modify </a></th>
				</tr>	
<?php
				}
			}
			$con->close();
			
		?>
			
			
?>