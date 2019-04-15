<?php 
session_start();
require_once('html/database/databaseinfo.php');
	$query = "SELECT * FROM book";
	$result = $con->query($query);
	$i=$result->num_rows;
?>		

<!DOCTYPE html>
<html>
	<head>
		<title>Sahara Books</title>
		<link rel="stylesheet" type="text/css" href="css/temp.css">
		<link rel="stylesheet" type="text/css" href="css/countdown.css">
		<script src="js/drag-and-drop.js"></script>
	</head>
	
	<body >
		<div class="flexhead">
			<div class="logo">
				<a href="homepage.php"><img src="picture/logo.png" style="width:30px; height:30px;" alt="logo"></a>
			</div>	
	
	
	<!--if logged in, display: shopping cart + logout buttons-->
	<!--if not logged in, display: login + signup buttons-->
		<div class="loginsc">
		<?php
		if (isset($_SESSION['iflogin'])) {
			$uid=$_SESSION['username'];
			echo <<<ZZEOF
		<div class = "cart" >
			<a href="html/pages/shoppingcart.php">
			<img style="width:30px; height:30px;" src="picture/cart.svg"></a>
		</div>

		<!-- logout button-->
		<div class="login">
			<a href="html/database/logout.php"><input type="submit" value="Logout" ></a>
		</div>
ZZEOF;
		} else { 
			// 
			echo <<<ZZEOF
			<!-- login and sign up buttons-->
		<div class="login">
			<a href="html/pages/login.html"><input type="submit" value="Login" ></a>
			<a href="html/pages/signup.html"><input type="submit" value="Register"></a>
		</div>
ZZEOF;
		}
		?>
			</div>
	</div>
		
	<section id="blok1">
		<div class="typer">
			<h1 class="typeheader">:)
				<span class="txt-rotate" 
				data-period="2000" 
				data-rotate='[ "Welcome to Sahara Books", "stay long, gain more", "Wait for 1 mins, you will obtain a discount code :)" ]'></span>
			</h1>
		</div>
    </section>
	
	<div class = "header">
		<h1><a href="homepage.php">Sahara Books</a></h1>
	</div>
	
	<div class="menu">
		<ul>
		<li>
		<span id="id111" ondrop="drop(event)" ondragover="allowDrop(event)"> 
			<a href = "homepage.php" id = "id12" draggable="true" ondragstart="drag(event)">Home</a>
			</span></li>
			
			<li><span id="id13" ondrop="drop(event)" ondragover="allowDrop(event)"> 
			<a href = "html/pages/booktype.php?type=fiction" id = "id14" draggable="true" ondragstart="drag(event)">Fiction </a>
			</span></li>
			
			<li><span id="id21" ondrop="drop(event)" ondragover="allowDrop(event)"> 
			<a href = "html/pages/booktype.php?type=fiction" id = "id22" draggable="true" ondragstart="drag(event)">Romance </a>
			</span></li>
					
			<li><span id="id17" ondrop="drop(event)" ondragover="allowDrop(event)"> 
			<a href = "html/pages/booktype.php?type=Cook" id = "id18" draggable="true" ondragstart="drag(event)">Cookbooks </a>
			</span></li>


			<li><span id="id19" ondrop="drop(event)" ondragover="allowDrop(event)"> 
			<a href = "html/pages/booktype.php?type=picture" id = "id20" draggable="true" ondragstart="drag(event)"> Picture Books</a>
			</span></li>
 
		</ul>

	<div class="search">
		<form action="html/pages/search.php" method="get">
			<input type="text" name="prodsearch" placeholder="keyword, title, or author">
			<input type="submit" value="go"> <br>
		</form>
	</div>
	
	<div class = "product">
		<?php 
		if ($i>0) {
		while($row = $result->fetch_assoc()){
			$bid = $row['bookId'];
			$bname = $row['bookName'];
			$bauthor = $row['bookAuthor'];
			$bintro = $row['bookIntro'];
			$bimage = $row['bookImage'];
			$btype = $row['bookType'];
			$bprice = $row['bookPrice'];
						echo <<<ZZEOF
			<div class="inproduct">
				<img src="picture/$btype/$bimage"" >
				<a href= html/pages/product.php?id=$bid>
				<h3>$bname</h3></a>
				$$bprice&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ZZEOF;
			if(isset($uid)){
				echo <<<ZZEOF
				<a href="html/database/addsc.php?add=add&bid=$bid&uid=$uid"
				style="
				background-color: #f44336;
				color: white;
				padding: 7px 15px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				">add</a>
				
			</div>
ZZEOF;
			}
		}	
	}
		?>
	</div>
	
<div id="discount">
	<div>
	<span class = "Discount code"></span>
	<h1>Discount code countdown</h1>
	</div>
<div id="clock">
  <div>
    <span class="hours"></span>
    <div class="smalltext">Hours</div>
  </div>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>
	<div id="ccp">
	<button onclick="readcoupon()" id="Coupon" class="button">Coupon</button>
	</div>
</div>

	</body>

    <div class="title">
		<a style="text-decoration:none;" href="html/pages/about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="html/pages/contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
	<script src=js/fun.js></script>	
</html>


