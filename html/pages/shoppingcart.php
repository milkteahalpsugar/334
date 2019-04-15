<?php
/*
this file show what's in a user's basket
call by click the basket image
*/
	session_start();
	$uid='';
	$bid='';
	$subtotal=0;

?>
<!DOCTYPE html>
<html>
	<head>
		<title>product page</title>
		<link rel="stylesheet" type="text/css" href="../../css/temp.css">
		<script src="../../js/drag-and-drop.js" type="application/javascript"></script>
	</head>
	
	<body>
		<div class="flexhead">
		<div class="logo">
			<a href="../../homepage.php"><img src="../../picture/logo.png" style="width:30px; height:30px;" alt="logo books"></a>	
		</div>
		<div class="loginsc">
	<?php
		if (isset($_SESSION['iflogin'])){	
		$uid=$_SESSION['username'];
		echo <<<ZZEOF
		<div class = "cart" >
			<a href="shoppingcart.php"><img style="width:30px; height:30px;" src="../../picture/cart.svg"></a>
		</div>

		<div class="login">
			<a href="../database/logout.php"><input type="submit" value="Logout" ></a>
		</div>
ZZEOF;
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
		
		
		<div class = "research" style="padding-left:100px;" >
			<form action="search.php" method="post">
				<input type="text" name="prodsearch" />
				<input type ="submit" value="go" name="go"/>
			</form>
		</div>
		
		<div class = "productGrid" id="productGrid">
		<table style="white-space:nowrap;">
			<tr>
				<th><h3>book name&nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
					</h3></th>
				<th></th>
				<th><h3>count</h3></th>
				<th></th>
				<th><h3>price</h3></th><br>
				<th></th>
			</tr>
			<?php 
		require_once('../database/databaseinfo.php');
		
		$query = "SELECT * FROM book, basket,users 
		WHERE `bid`=`bookId` AND `uid`=`user_uid` AND `uid`='$uid';";
		$result = $con->query($query);
		
		if(!$result){
		//echo ("Error description: " . mysqli_error($con));
		}
		if (!empty($result) && $result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$bprice = $row['bookPrice'];
				$bid = $row['bid'];
				$bcount = $row['count'];
				$bname = $row['bookName'];
				$bauthor = $row['bookAuthor'];
				$bintro = $row['bookIntro'];
				$bimage = $row['bookImage'];
				$subtotal=$subtotal+$bprice*$bcount;
				?>
				<tr>
					<th><a href = "product.php?id=<?php echo $bid;?>"><?php echo $bname; ?>&nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					&nbsp; &nbsp; &nbsp; </a></th>
					<th style=" text-align:center;"><a href="../database/addsc.php?add=add&bid=<?php echo $bid;?>&uid=<?php echo $uid;?>">+1</a></th>
					<th style=" text-align:center;"><?php echo $bcount ?></th>
					<th><a href="../database/addsc.php?add=rem&bid=<?php echo $bid;?>&uid=<?php echo $uid;?>">-1</a></th>
					<th style=" text-align:center;">$<?php echo $bprice ?></th><br>
					<th><a href="../database/removesc.php?remove=r&bid=<?php echo $bid;?>&uid=<?php echo $uid;?>">remove</a></th>
				</tr>
			<?php 
			}			
		}
			?>
			</table>
			<h3 style="margin-left:500px;">subtotal:$<?php echo sprintf("%.2f", $subtotal); ?></h3>
		</div>
	</body>
	
	<div class="footer">
		<a style="text-decoration:none;" href="about_us.php">&nbsp; About Us&nbsp; &nbsp; </a>
		<a style="text-decoration:none;" href="contact_us.php">&nbsp; &nbsp; Contact Us</a>
	</div>
</html>
<?php
}
	else{
		header('location:login.html');	
	}
?>