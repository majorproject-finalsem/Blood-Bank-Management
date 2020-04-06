<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header" align="center"><h2>Blood Bank Management System</h2></div>
		<div id="body">
			<br><br><br>
			<?php 
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1 align="center" style="color: green">Welcome Admin</h1>
			<br><br><br><br>
			<ul>
				<li><a href="donor-registration.php">Donor Registration</a></li>
				<li><a href="donor-list.php">Donor List</a></li>
				<li><a href="stock-blood-list-1.php">Stock Blood List</a></li>
			</ul>
			<br><br><br><br>
			<ul>
				<!--<li><a href="out-stock-blood-list.php">Out Stock Blood List</a></li>-->
				<li><a href="exchange-blood-registration.php">Exchange Blood Registration</a></li>
				<li><a href="exchange-blood-list.php">Exchange Blood List</a></li>
				<li><a href="ngo-main.php">NGO</a></li>
			</ul>
		</div>
		<div class="footer">
			<h5 align="center">Copyright@BBMS</h5>
			<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
		</div>
	</div>
</div>
</body>
</html>