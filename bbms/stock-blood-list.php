<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stock Blood List</title>
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
		<div id="body-sbl">
			<br><br><br>
			<?php 
			$un=$_SESSION['un'];
			if(!$un)
			{
				header("Location:index.php");
			}
			?>
			<h1 align="center" style="color: green">Stock Blood List</h1>
			<br><br><br><br>
			<center>
				<div id="dr-form-sbl">
					<table>
						<tr>
							<td><center><b><font color="black">Name</font></b></center></td>
							<td><center><b><font color="black">Count(Donations)</font></b></center></td>
							<td><center><b><font color="black">Quantity(ml)</font></b></center></td>
						</tr>
						<tr>
							<td><center><b>A+</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A+' || bgroup='a+'");
								echo $a_pos=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A+' || bgroup='a+'");
								$a_pos=$q->rowcount(); 
								if($a_pos > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='A+' || bgroup='A+'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $b_pos;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>B+</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B+' || bgroup='b+'");
								echo $b_pos=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B+' || bgroup='b+'");
								$b_pos=$q->rowcount(); 
								if($b_pos > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='B+' || bgroup='b+'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $b_pos;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>AB+</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+' || bgroup='ab+'");
								echo $ab_pos=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB+' || bgroup='ab+'");
								$ab_pos=$q->rowcount(); 
								if($ab_pos > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='AB+' || bgroup='ab+'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $ab_pos;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>O+</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O+' || bgroup='o+'");
								echo $o_pos=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O+' || bgroup='o+'");
								$o_pos=$q->rowcount(); 
								if($o_pos > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='O+' || bgroup='o+'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $o_pos;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>A-</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A-' || bgroup='a-'");
								echo $a_neg=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='A-' || bgroup='a-'");
								$a_neg=$q->rowcount(); 
								if($a_neg > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='A-' || bgroup='a-'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $a_neg;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>B-</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B-' || bgroup='b-'");
								echo $b_neg=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='B-' || bgroup='b-'");
								$b_neg=$q->rowcount(); 
								if($b_neg > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='B-' || bgroup='b-'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $b_neg;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>AB-</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-' || bgroup='ab-'");
								echo $ab_neg=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='AB-' || bgroup='ab-'");
								$ab_neg=$q->rowcount(); 
								if($ab_neg > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='AB-' || bgroup='ab-'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $ab_neg;
								}
								?>
							</b></center></td>
						</tr>
						<tr>
							<td><center><b>O-</b></center></td>
							<td><center><b>
								<?php 
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O-' || bgroup='o-'");
								echo $o_neg=$q->rowcount(); 
								?>
							</b></center></td>
							<td><center><b>
								<?php
								$q=$db->query("SELECT * FROM donor_registration WHERE bgroup='O-' || bgroup='o-'");
								$o_neg=$q->rowcount(); 
								if($o_neg > 0)
								{
									$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='O-' || bgroup='o-'");
									$get_sum->execute();
									if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
									{
										echo $total=$data['total'];
									}
								}
								else
								{
									echo $o_neg;
								}
								?>
							</b></center></td>
						</tr>
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