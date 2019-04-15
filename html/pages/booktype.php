<?php
/*
this pages will show the list of book under catergory: fiction,picture,cook and romance
*/
session_start();
$i=0;
$btype = $_GET["type"];
require_once('../database/databaseinfo.php');

$query = "SELECT * FROM book WHERE `bookType` = '$btype';";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>bookType</title>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
		<link rel="stylesheet" type="text/css" href="../../css/countdown.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>
	</head>
	
	<body>
	
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


		<div class="search">
			<form action="search.php" method="get">
				<input type="text" name="prodsearch" placeholder="keyword, title, or author" />
				<input type="submit" value="search"/>
			</form>
		</div>
		
		<div class = "product" style="padding-left:25%;">
			<?php
			if ($result->num_rows>0) {	
				while($row = $result->fetch_assoc()){
					$bname = $row['bookName'];
					$bid = $row['bookId'];
					$bauthor = $row['bookAuthor'];
					$bintro = $row['bookIntro'];
					$bimage = $row['bookImage'];
					$btype = $row['bookType'];
					$bprice = $row['bookPrice'];
			
			echo <<<ZZEOF
			<div class="inproduct">
			<img src="../../picture/$btype/$bimage" style="float:left;width=20%; height=20%;" >
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
?>
		</div>
		

		<div class="title">
		<a style="text-decoration:none;" href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
	<div class ='svg'>
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
		<text x="" y="85">Welcome to Sahara</text>
		<text x="5" y="110">Bookstore</text>
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
	</body>
</html>
