<?php
include_once '../database/process_signup.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sign Up</title>
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
			<li><a href = "../../homepage.php">Home</a></li>
			<li><a href = "booktype.php?type=fiction">Fiction </a></li>
			<li><a href = "booktype.php?type=romance">Romance</a></li>
 			<li><a href = "booktype.php?type=cook">Cookbooks</a></li>
			<li><a href = "booktype.php?type=picture">Picture Books</a></li>
		</ul>
	</div>

	<h3>Please enter your name and email address to sign up for an account</h3>
	
	<?php
	include_once '../database/signup_alerts/username_taken.js';
	?>
	
	<div class ="form">
		<form class="form" method="POST" action="../database/process_signup.php">
			<input name="firstname" type="text" class="form-control" placeholder="First Name" value='<?php echo $firstname?>'><br>
			<input name="lastname" type="text" class="form-control" placeholder="Last Name" value='<?php echo $lastname?>'><br>
			<input name="email" type="email" class="form-control" placeholder="email" value='<?php echo $email?>'><br>
			<input name="username" type="text" class="form-control" placeholder="User ID" required><br>
			<input name="password" type="password" class="form-control" placeholder="password" required><br>
			<input name="submit" type="submit" class="form-control submit" value="Sign Up"><br>
		</form>
	</div>

	<div class="footer">
		<a style="text-decoration:none;" href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
	
	</body>
</html>
	