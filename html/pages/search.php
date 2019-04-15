<?php
/*
this file is used when people tried to research item from research bar
supported by file: trysearch, html/database/searchlist.php
*/
session_start();
	$input='';
	if (isset($_GET["prodsearch"])){
		$input=$_GET["prodsearch"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>product page</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>
	</head>
	
	<body>
		<div class="flexhead">
			<div class="logo">
				<a href="../../homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo"></a>
			</div>	
	
	
	<!--if logged in, display: shopping cart + logout buttons-->
	<!--if not logged in, display: login + signup buttons-->
		<div class="loginsc">
		<?php
		if (isset($_SESSION['iflogin'])) {
			$uid=$_SESSION['username'];
			echo <<<ZZEOF
		<div class = "cart" >
			<a href="shoppingcart.php">
			<img style="width:30px; height:30px;" src="../../picture/cart.svg"></a>
		</div>

		<!-- logout button-->
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
			
		<div class = "search" style="padding-left:100px;">
			<input type="text" name="search" id="search" placeholder="keyword, title, or author">
			<input type ="submit" value="go" name="go"/>
		</div>
		
		<script type="text/javascript">	
			$("#search").keyup(function(){
			var txt = $(this).val();
			$.ajax({
				url: "../database/searchlist.php",
				method:"post",
				data:{search:txt},
				dataTyple:"text",
				success: function(result){
					$("#product").html(result);
				}
				});
			});
		</script>
			
		<div id="product" class="product" >
			<?php 
				require_once('trysearch.php');
			?>
		</div>
		<div class="footer">
			
		</div>
	</body>
</html>

