<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Sahara Books</title>
		<link rel="stylesheet" type="text/css" href="../../css/style.css">
		<link rel="stylesheet" type="text/css" href="../../css/style2.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>

	</head>
	
	<body>
	<link rel="stylesheet" type="text/css" href="css/countdown.css">

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
		
		<br>
		<h3>We are happy to answer any of your questions!</h3>

		<div class="form";>
			<form name="contact-form" class="form" method="post" action="../database/process_contact_us.php">
			<input name="name" type="text" class="form-control" placeholder="Your Full Name" required><br>
			<input name="email" type="email" class="form-control" placeholder="Your email" required><br>
			<textarea name="message" placeholder="Your Message" required></textarea><br>
			<input name="submit" type="submit" class="form-control submit" value="SEND MESSAGE">
		</div>

	</body>

	<div class="footer">
		<a style="text-decoration:none;" href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
<div class ='svg' style="padding-left:50%">
	<svg width="300px" height="300px" viewBox="-200 -100 400 400" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1">
	<defs>
		<rect id="animatedRect" x="-400" y="-100" width="400" height="400">
			<animateTransform attributeName="transform" type="rotate"
				from="45,0,-150" to="0,0,-150"
				begin="0s" dur="3s"
				repeatCount="indefinite"
				calcMode="spline" keyTimes="0;1" keySplines="0.42 0.0 0.58 1.0"
			/>
		</rect>
		<clipPath id="clip">
			<use xlink:href="#animatedRect"/>
		</clipPath>
		<mask id="mask" maskUnits="userSpaceOnUse" x="-200" y="-100" width="400" height="400">
			<rect x="-150" y="0" width="150" height="200" fill="hsla(255,255%,255%,1)" clip-path="url(#clip)"/>
        </mask>
		<g id="page">
			<rect x="-150" y="0" width="150" height="200" fill="hsla(52, 95%, 95%, 1)"/>

		</g>
		<linearGradient id="centerGrad" x1="1" x2="0">
			<stop offset="0" stop-color="hsla(0,0%,0%,1)" stop-opacity="0.3"/>
			<stop offset="0.02" stop-color="hsla(0,0%,0%,1)" stop-opacity="0"/>
		</linearGradient>
		<filter id="shadow">
			<feOffset in="SourceAlpha">
				<animate attributeName="dx"
					begin="0s" dur="3s"
					repeatCount="indefinite"
					calcMode="linear" keyTimes="0;0.5;1" values="0;-1;0"
				/>
				<animate attributeName="dy"
					begin="0s" dur="3s"
					repeatCount="indefinite"
					calcMode="linear" keyTimes="0;0.5;1" values="0;1;0"
				/>
			</feOffset>
			<feGaussianBlur>
				<animate attributeName="stdDeviation"
					begin="0s" dur="3s"
					repeatCount="indefinite"
					calcMode="linear" keyTimes="0;0.5;1" values="0;3;0"
				/>
			</feGaussianBlur>
			<feMerge>
				<feMergeNode/>
				<feMergeNode in="SourceGraphic"/>
			</feMerge>
		</filter>
	</defs>

	<rect x="-161" y="2" width="322" height="208" fill="hsla(52, 5%, 55%, 1)" rx="2" ry="2"/>
	<rect x="-160" y="1" width="320" height="208" fill="hsla(1, 95%, 15%, 1)" rx="2" ry="2"/>
	<path d="M-150,0 L-155,5 V205 L-5,205 L0,200" fill="hsla(52, 5%, 85%, 1)"/>
	<path d="M150,0 L155,5 V205 L5,205 L0,200" fill="hsla(52, 5%, 85%, 1)"/>
	
	<rect x="0" width="150" height="200" fill="hsla(52, 95%, 95%, 1)"/>
	<g font-family="ubuntu" font-size="15">
		<text x="25" y="85">Welcome to Sahara</text>
		<text x="45" y="110">Bookstore</text>
		<text x="40" y="135"></text>
	</g>
	<use xlink:href="#page"/>
	<rect  x="-400" y="0" width="400" height="200" fill="url(#centerGrad)"/>
    <g filter="url(#shadow)">
        <g>
            <g mask="url(#mask)">
                <use xlink:href="#page"/>
                <use xlink:href="#animatedRect" fill="url(#centerGrad)"/>
            </g>
            <animateTransform attributeName="transform" type="rotate"
                from="-90,0,-150" to="0,0,-150"
                begin="0s" dur="3s"
                repeatCount="indefinite"
                calcMode="spline" keyTimes="0;1" keySplines="0.42 0.0 0.58 1.0"/>
        </g>
    </g>
</svg>
</div>		
</body>

</html>