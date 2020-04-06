<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header">
			<h2 align="center">Blood Bank Management System</h2>
		</div>
		<div id="body">
			<br><br><br>
			<form action="" method="post">
			<table align="center">
				<tr>
					<td width="200px" height="50px"><b>Enter Username</b></td>
					<td width="200px" height="50px"><input type="text" name="un" placeholder="Enter Username" style="width: 180px;height: 30px;border-radius: 5px"></td>
				</tr>
				<tr>
					<td width="200px" height="50px"><b>Enter Password</b></td>
					<td width="200px" height="50px"><input type="text" name="ps" placeholder="Enter Password" style="width: 180px;height: 30px;border-radius: 5px"></td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="sub" value="Login" style="width: 70px;height: 30px;border-radius: 5px;">
					</td>
				</tr>
			</table>
			</form>
			<?php 
			if (isset($_POST['sub'])) 
			{
				$un=$_POST['un'];
				$ps=$_POST['ps'];
				$q=$db->prepare("SELECT * FROM admin WHERE uname='$un' && pass='$ps'");
				$q->execute();
				$res=$q->fetchAll(PDO::FETCH_OBJ);
				if($res)
				{
					$_SESSION['un']=$un;
					header("Location:admin-home.php");   # admin-home we use - as it makes it a keyword and helps in google or other search engine indexing. 
				}
				else
				{
					echo "<script>alert('Wrong User')</script>";
				}
			}
			?>
		</div>
		<div class="footer">
			<h5 align="center">Copyright@BBMS</h5>
		</div>
	</div>
</div>
</body>
</html>