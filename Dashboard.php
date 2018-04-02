<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
		include('connection.php');
		$val = $_GET["val"];
		if (isset($_SESSION['uname'])!=0) {
			$uname = $_SESSION['uname'];
			$myQuery = "SELECT * FROM registration WHERE username='".$uname."'";
			$r=  mysqli_query($dbc, $myQuery) or die($myQuery."<br/><br/>".mysql_error());
			$row = mysqli_fetch_array($dbc, "SELECT * FROM registration");
			$_SESSION['uname'] = $uname;
		}
	?>
	<link rel="stylesheet" type="text/css" href="http://localhost/proj/dashboard.css">
	<title>1Tag</title>
</head>
<body style="background-image: url('5.jpg');">
	<nav id="myHeader" style="margin-left: -9px; margin-right: -9px; margin-top: -8px; position: fixed; top: 8px; width: 100%;">
	    <ul class="ls">
	        <li class="ls"><a href="http://localhost/fuckinFromSkratch/profile.php?uname=<?=$uname?>">Profile</a></li>
	        <li class="ls"><a href="http://localhost/fuckinFromSkratch/Tagboard.php?val=Tags">Tags</a></li>
	        <li class="ls"><a href="#" id="searchbox">Search</a></li>
	        <li class="ls"><a href="#">Others</a></li>
	    </ul>
	<button type="button" id="logout" class="button3"  onclick="window.location.href = 'http://localhost/fuckinFromSkratch/logout.php'" 
													   value="check" style="															        
													   	   margin-right: 5%;
		        										   padding: 6px 16px;
		        										   font-size: 14px;
		        										   margin-top: -3%;">Log out</button>
	</nav>

	<div class="dash">
		<h1>Dashboard</h1>
	</div>

	<div class="container"></div>
	
	<div class="postbox">
			<p><br></p>
			<p><br></p>
			<form>
				<input type="text" placeholder="Write a post..." name="text">
			    <button type="submit" class="button3" style=" padding:6px 16px; font-size: 14px; margin-left: -6%;" name="submit">POST</button>
			</form>
			<p><br></p>
			<h2 style="text-align: center;">No posts to show.</h2>
	</div>

	<footer>Copyright &copy; 1tag.com</footer>

</body>
</html>