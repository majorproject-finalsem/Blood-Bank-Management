<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>NGO Association</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		ul li{
			width: 35%;
		}
	</style>
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header" align="center"><a href="admin-home.php"><h2>Blood Bank Management System</h2></a></div>
		<div id="body">
			<br><br><br>
			<h1 align="center" style="color: green">NGO Informatica</h1>
			<br><br><br><br>
			<ul>
				<li><a href="ngo-registration.php">NGO Registration</a></li>
				<li><a href="ngo-list.php">NGO List</a></li>
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