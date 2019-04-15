<?php
/*
this one will give admin function to remove, modify, and remove a book
all support function is stored in html/database/admin/*
modifyfunction.php - change price or intro
remove.php - remove a book
upload.php && newbook.html(in directory html/pages/) - create new book
*/
session_start();
if(isset($_GET["input"])){
	$input=$_GET["input"];
}
else{
	$input='';
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Book</title>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>
	</head>
	<body style="font-family: arial">	
		<div class="flexhead">
			<div class="logo">
				<a href="homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo"></a>
			</div>	
	
		<!-- logout button-->
			<div class="loginsc">
				<div class="login">
					<a href="../database/logout.php"><input type="submit" value="Logout" ></a>
				</div>
			</div>
		</div>
		
		<div class = "header">
			<h1><a href="admin.php">Sahara Books</a></h1>
		</div>
		<div class="menu">
			<ul>
				<li>
				<span id="id111" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "admin.php" id = "id12" draggable="true" ondragstart="drag(event)">Home</a>
				</span></li>
				
				<li><span id="id13" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "admin.php?input=fiction" id = "id14" draggable="true" ondragstart="drag(event)">Fiction </a>
				</span></li>

				<li><span id="id21" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "admin.php?input=romance" id = "id22" draggable="true" ondragstart="drag(event)"> Romance </a>
				</span></li>
				
				<li><span id="id17" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "admin.php?input=cook" id = "id18" draggable="true" ondragstart="drag(event)">Cookbooks </a>
				</span></li>


				<li><span id="id19" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "admin.php?input=picture" id = "id20" draggable="true" ondragstart="drag(event)"> Picture Books</a>
				</span></li>
	 
			</ul>
		</div>
		
		<div class = "search" style="padding-left:100px;">
			<input type="text" name="search" id="search">
			<input type ="submit" value="go" name="go"/>
		</div>
		
		
		<div id="product" class="productGrid">
		<table style="white-space:nowrap;">
			<tr>
		<?php
			require_once('../database/databaseinfo.php');
			$query = "SELECT * FROM book
					WHERE `bookName` LIKE '%$input%' 
					OR `bookId` LIKE '%$input%' 
					OR `bookAuthor` LIKE '%$input%'
					OR `bookIntro` LIKE '%$input%'
					OR `bookType` LIKE '%$input%';";
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
		
		</div>
		<div class="newbook" style="padding-top:5%;">
			<button onclick="newbook()">add new book</button><br>
		</div>
		
		<div id="newbookform">
		
		</div>
		
		<script type="text/javascript">	
		//ajax to show add new book form when click 'add'button
		function newbook(){
			var clicks = $(this).data('clicks');
			if(clicks){
				document.getElementById("newbookform").innerHTML ="";
			}
			else{
				$(document).ready(function(){
						$.ajax({
						url:"tryupload.html",
						success: function(result){
							$("#newbookform").html(result);
						}
					});
				});
			}	
			$(this).data("clicks", !clicks);
				
		}
			
		$("#search").keyup(function(){
			var txt = $(this).val();
			$.ajax({
				url: "../database/admin/adminsearch.php",
				method:"post",
				data:{search:txt},
				dataTyple:"text",
				success: function(result){
					$("#product").html(result);
				}
				});
			});
		</script>
    </body>
</html>
