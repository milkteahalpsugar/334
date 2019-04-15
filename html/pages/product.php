<?php
/*
this page will show a books information
*/
session_start();
$bid = $_GET["id"];
$uid='';
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
		<title>Books</title>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>
	<body>

	<!--if logged in, display: shopping cart + logout buttons-->
	<!--if not logged in, display: login + signup buttons-->
	<div class="flexhead">
		<div class="logo">
			<a href="../../homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo books"></a>	
		</div>
		<div class="loginsc">
	<?php
	
	if (isset($_SESSION['iflogin'])) {
		$uid=$_SESSION['username'];
		
		echo <<<ZZEOF
	<div class = "cart" >
		<a href="shoppingcart.php"><img style="width:30px; height:30px;" src="../../picture/cart.svg"></a>
	</div>
	
	<div class="login">
		<a href="../database/logout.php"><input type="submit" value="Logout" ></a>
	</div>
	
ZZEOF;

	} else { 
		// 
		echo <<<ZZEOF
		<!-- login and sign up buttons-->
	<div class="login">
		<a href="login.html"><input type="submit" value="Login" ></a>
		<a href="signup.html"><input type="submit" value="Register"></a>
	</div>
ZZEOF;
	}
?>
			</div>
		</div>	
		<div class = "header">
			<h1><a href="../../homepage.php">Sahara Books</a></h1>
		</div>
		
		
		<div class="menu">
			<ul>
				<li>
				<span id="id111" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "../../homepage.php" id = "id12" draggable="true" ondragstart="drag(event)">Home</a>
				</span></li>
				
				<li><span id="id13" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "booktype.php?type=fiction" id = "id14" draggable="true" ondragstart="drag(event)">Fiction </a>
				</span></li>
				
				<li><span id="id21" ondrop="drop(event)" ondragover="allowDrop(event)"> 
					<a href = "booktype.php?type=romance" id = "id22" draggable="true" ondragstart="drag(event)">Romance </a>
				</span></li>
						
				<li><span id="id17" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "booktype.php?type=Cook" id = "id18" draggable="true" ondragstart="drag(event)">Cookbooks </a>
				</span></li>


				<li><span id="id19" ondrop="drop(event)" ondragover="allowDrop(event)"> 
				<a href = "booktype.php?type=picture" id = "id20" draggable="true" ondragstart="drag(event)"> Picture Books</a>
				</span></li>
	 
			</ul>
		</div>
		
		<div class = "search" >
			<form action="search.php" method="get">
				<input type="text" name="prodsearch" placeholder="keyword, title, or author"/>
				<input type ="submit" value="go" name="go"/>
			</form>
		</div>
		
		<div class ="productGrid" >
			<img src="../../picture/<?php echo $btype."/".$bimage?>" >		
				<?php 
			if($uid!=''){
				echo <<<ZZEOF
			<div class="add" style="float:right;">
				<form action="../database/addsc.php" method="get">
					<input type="hidden" value="$bid" name="bid">
					<input type="hidden" value="$uid" name="uid" ?>
					<input type="submit" value="add" name="add">
				</form>
			</div>
ZZEOF;
		}
?>		
			
			<h1><?php echo $bname?></h1>
			<h3><?php echo $bauthor?></h3>
			<h3 style="text-align: right;">price:$<?php echo $bprice?></h3>
			<p><br><?php echo $bintro?></p>
			
		</div>
		

    </body>

    <div class="footer">
		<a style="text-decoration:none;" href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
</html>
