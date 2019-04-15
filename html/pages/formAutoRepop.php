<?php
  /* the email and password is sticky and allows 
	 the user to correct 
  */
include_once '../database/process_login.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sahara Books</title>
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<link rel="stylesheet" type="text/css" href="../../css/style2.css">

	</head>
	
	<body>
		<header>
			<div class="logo">
				<a href="../../homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo books"></a>
			</div>	

		</header>

		<h1><a href="../../homepage.php">Sahara Books</a></h1>
	
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

	<br>
	<h3 class="h3">Please sign in</h3>
	<?php
	include_once '../database/login_alerts/password_error.js';
	?>
	<div class="form">
		<form id="form" method="post" action="../database/process_login.php">
		<input name="username" type="text" class="form-control" placeholder="User ID" value= '<?php echo $uid?>'><br>
		<input name="password" type="password" class="form-control" placeholder="password" required><br>
		<input name="submit" type="submit" class="form-control submit" value="Login"><br>
	</div>
	
	<div class="footer">
		<a href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a  href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>

</body>
</html>


