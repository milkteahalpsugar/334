<?php
/*
this pages will allowed by admin user to modify the price
call by admin.php
function supported by html/database/admin/modifyfunction.php
*/
	$bid = $_GET["bid"];
	require_once('../database/databaseinfo.php');
	$con = new mysqli($sn,$un,$pw,$db);
	$query = "SELECT * FROM book WHERE `bookId` = '$bid';";
	$result = $con->query($query);
	$row = $result->fetch_assoc();
	$bname = $row['bookName'];
	$bid = $row['bookId'];
	$bauthor = $row['bookAuthor'];
	$bintro = $row['bookIntro'];
	$bimage = $row['bookImage'];
	$btype = $row['bookType'];
	$bprice = $row['bookPrice'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Book</title>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
	</head>
	<body>
		<div class="flexhead">
			<div class="logo">
				<a href="../../homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo books"></a>	
			</div>
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
		
		<div class = "product">
			<form action="../database/admin/modifyfunction.php" action="get">
				<input type="hidden" name="bid" value="<?php echo $bid ?>">
				<h3>current price:$<?php echo $bprice?></h3>
				new price: <input type="text" name="bprice">
				<input type="submit" value="change" name="price">
				
				<h3>current introduction:</h3><p><?php echo $bintro?></p>
				new intro: <input type="text" name="bintro">
				<input type="submit" value="change" name="intro">
			</form>
		</div>
		<br><br><a href="admin.php"><button>back to panel</button></a>
		<div class = "footer" style="text-align:center;">
			
		</div>
    </body>
</html>