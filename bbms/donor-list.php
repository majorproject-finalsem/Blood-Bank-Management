<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor List</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
	<style type="text/css">
		td{
			width: 200px;
			height: 40px;
		}
	</style>
</head>
<body>
<div id="full">
	<div id="inner_full">
		<div id="header" align="center"><a href="admin-home.php"><h2>Blood Bank Management System</h2></a></div>
		<div id="body">
			<br><br><br>
			<?php 
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1 align="center" style="color: green">Donor List</h1>
			<br><br><br><br>
			<center>
				<div id="dr-form">
					<table>
						<tr>
							<td><center><b><font color="black">Name</font></b></center></td>
							<td><center><b><font color="black">Father's Name</font></b></center></td>
							<td><center><b><font color="black">Address</font></b></center></td>
							<td><center><b><font color="black">City</font></b></center></td>
							<td><center><b><font color="black">Age</font></b></center></td>
							<td><center><b><font color="black">Blood Group</font></b></center></td>
							<td><center><b><font color="black">Email</font></b></center></td>
							<td><center><b><font color="black">Mobile No.</font></b></center></td>
							<td><center><b><font color="black">Quantity(ml)</font></b></center></td>
						</tr>
						<?php 
						$q=$db->query("SELECT * FROM donor_registration");
						while($result=$q->fetch(PDO::FETCH_OBJ))
						{
							?>
								<tr>
									<td><center><b><?= $result->name; ?></b></center></td>
									<td><center><b><?= $result->fname; ?></b></center></td>
									<td><center><b><?= $result->address; ?></b></center></td>
									<td><center><b><?= $result->city; ?></b></center></td>
									<td><center><b><?= $result->age; ?></b></center></td>
									<td><center><b><?= $result->bgroup; ?></b></center></td>
									<td><center><b><?= $result->email; ?></b></center></td>
									<td><center><b><?= $result->mno; ?></b></center></td>
									<td><center><b><?= $result->qnt; ?></b></center></td>
								</tr>
							<?php
						}
						?>
					</table>
				</div>
			</center>
		</div>
		<div class="footer">
			<h5 align="center">Copyright@BBMS</h5>
			<p align="center"><a href="logout.php"><font color="white">Logout</font></a></p>
		</div>
	</div>
</div>
</body>
</html>