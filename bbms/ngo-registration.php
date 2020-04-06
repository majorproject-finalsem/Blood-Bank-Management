<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>NGO Registration</title>
	<link rel="stylesheet" type="text/css" href="css/s1.css">
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
			<h1 align="center" style="color: green">NGO Registration</h1>
			<br><br><br><br>
			<center>
				<div id="dr-form">
					<form action="" method="post">
					<table>
						<tr>
							<td width="200px" height="50px">NGO Name</td>
							<td width="200px" height="50px"><input type="text" name="ngoname" placeholder="Enter Name" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Contact Person Name</td>
							<td width="200px" height="50px"><input type="text" name="cname" placeholder="Enter Officer Name" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Address</td>
							<td width="200px" height="50px"><textarea name="address" style="border-radius: 5px"></textarea></td>
						</tr>
						<tr>
							<td width="200px" height="50px">City</td>
							<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City" style="border-radius: 5px"></td>
							<td width="200px" height="50px">State</td>
							<td width="200px" height="50px"><input type="text" name="state" placeholder="Enter State" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Official Email</td>
							<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Contact No.</td>
							<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile. no." style="border-radius: 5px"></td>
						</tr>
					</table>
					<p><input type="submit" name="sub" value="Save" style="border-radius: 5px"></p>
					</form>
					<?php 
					if(isset($_POST['sub']))
					{
						$ngoname=$_POST['ngoname'];
						$cname=$_POST['cname'];
						$address=$_POST['address'];
						$city=$_POST['city'];
						$state=$_POST['state'];
						$email=$_POST['email'];
						$mno=$_POST['mno'];

						$q=$db->prepare("INSERT INTO ngo_registration (ngoname,cname,address,city,state,email,mno) VALUES (:ngoname,:cname,:address,:city,:state,:email,:mno)");
						
						$q->bindValue('ngoname',$ngoname);
						$q->bindValue('cname',$cname);
						$q->bindValue('address',$address);
						$q->bindValue('city',$city);
						$q->bindValue('state',$state);
						$q->bindValue('email',$email);
						$q->bindValue('mno',$mno);
						if($q->execute())
						{
							echo "<script>alert('NGO Registration Successfull')</script>";
						}
						else
						{
							echo "<script>alert('NGO Registration Failed')</script>";	
						}
					}
					?>
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