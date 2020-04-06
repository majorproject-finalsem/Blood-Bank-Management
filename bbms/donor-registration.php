<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Donor Registration</title>
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
			<h1 align="center" style="color: green">Donor Registration</h1>
			<br><br><br><br>
			<center>
				<div id="dr-form">
					<form action="" method="post">
					<table>
						<tr>
							<td width="200px" height="50px">Name</td>
							<td width="200px" height="50px"><input type="text" name="name" placeholder="Enter Name" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Father's Name</td>
							<td width="200px" height="50px"><input type="text" name="fname" placeholder="Enter Father's Name" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Address</td>
							<td width="200px" height="50px"><textarea name="address" style="border-radius: 5px"></textarea></td>
							<td width="200px" height="50px">City</td>
							<td width="200px" height="50px"><input type="text" name="city" placeholder="Enter City" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Age</td>
							<td width="200px" height="50px"><input type="text" name="age" placeholder="Enter Age" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Blood Group</td>
							<td width="200px" height="50px"><input type="text" name="bgroup" placeholder="Enter Blood Group" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Email</td>
							<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Mobile No.</td>
							<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile. no." style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Quantity(ml)</td>
							<td width="200px" height="50px"><input type="text" name="qnt" placeholder="Enter Quantity" style="border-radius: 5px"></td>
						</tr>
						<!--<tr>
							<td><input type="submit" name="sub" value="Save" style="border-radius: 5px"></td>
						</tr>-->
					</table>
					<p><input type="submit" name="sub" value="Save" style="border-radius: 5px"></p>
					</form>
					<?php 
					if(isset($_POST['sub']))
					{
						$name=$_POST['name'];
						$fname=$_POST['fname'];
						$address=$_POST['address'];
						$city=$_POST['city'];
						$age=$_POST['age'];
						$bgroup=$_POST['bgroup'];
						$email=$_POST['email'];
						$mno=$_POST['mno'];
						$qnt=$_POST['qnt'];
						$q=$db->prepare("INSERT INTO donor_registration (name,fname,address,city,age,bgroup,email,mno,qnt) VALUES (:name,:fname,:address,:city,:age,:bgroup,:email,:mno,:qnt)"); #This is a feature of PDO that is the prepare statement that prevents SQL Injection from occuring i.e. by passing reference values.
						#Now we have to bind the values with the references.
						$q->bindValue('name',$name);
						$q->bindValue('fname',$fname);	
						$q->bindValue('address',$address);
						$q->bindValue('city',$city);
						$q->bindValue('age',$age);
						$q->bindValue('bgroup',$bgroup);
						$q->bindValue('email',$email);
						$q->bindValue('mno',$mno);
						$q->bindValue('qnt',$qnt);
						if($q->execute())
						{
							echo "<script>alert('Donor Registration Successfull')</script>";
						}
						else
						{
							echo "<script>alert('Donor Registration Failed')</script>";	
						}
						#echo "<script>alert('Click')</script>";
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