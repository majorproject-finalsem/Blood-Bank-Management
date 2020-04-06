<?php 
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Exchange Registration</title>
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
			<h1 align="center" style="color: green">Exchange Blood Group Registration</h1>
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
							<td width="200px" height="50px">Email</td>
							<td width="200px" height="50px"><input type="text" name="email" placeholder="Enter E-mail" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Donation Blood Group</td>
							<td width="200px" height="50px"><input type="text" name="donatedbg" placeholder="Enter Donated BG" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Exchange Blood Group</td>
							<td width="200px" height="50px"><input type="text" name="exchangebg" placeholder="Enter Exchange BG" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Quantity Donated(ml)</td>
							<td width="200px" height="50px"><input type="text" name="dqnt" placeholder="Enter Donated Quantity" style="border-radius: 5px"></td>
							<td width="200px" height="50px">Quantity Taken(ml)</td>
							<td width="200px" height="50px"><input type="text" name="eqnt" placeholder="Enter Exchange Quantity" style="border-radius: 5px"></td>
						</tr>
						<tr>
							<td width="200px" height="50px">Mobile No.</td>
							<td width="200px" height="50px"><input type="text" name="mno" placeholder="Enter Mobile. no." style="border-radius: 5px"></td>
						</tr>
					</table>
					<p><input type="submit" name="sub" value="Save" style="border-radius: 5px"></p>
					</form>
					<?php
					if(isset($_POST['sub']))
					{
						$exchangebg=$_POST['exchangebg'];
						$eqnt=$_POST['eqnt'];
						$q1=$db->query("SELECT * FROM donor_registration WHERE bgroup='$exchangebg'");
						$a_pos=$q1->rowcount();
						if($a_pos > 0)
						{
							$get_sum=$db->prepare("SELECT SUM(qnt) AS total FROM donor_registration WHERE bgroup='$exchangebg'");
							$get_sum->execute();
							if($data=$get_sum->fetch(PDO::FETCH_ASSOC))
							{
								$total=$data['total'];
								if($total >= $eqnt)
								{
									$name=$_POST['name'];
									$fname=$_POST['fname'];
									$address=$_POST['address'];
									$city=$_POST['city'];
									$age=$_POST['age'];
									$email=$_POST['email'];
									$donatedbg=$_POST['donatedbg'];
									$exchangebg=$_POST['exchangebg'];
									$dqnt=$_POST['dqnt'];
									$eqnt=$_POST['eqnt'];
									$mno=$_POST['mno'];
									$q=$db->prepare("INSERT INTO exchng_registration (name,fname,address,city,age,email,donatedbg,exchangebg,dqnt,eqnt,mno) VALUES (:name,:fname,:address,:city,:age,:email,:donatedbg,:exchangebg,:dqnt,:eqnt,:mno)"); #This is a feature of PDO that is the prepare statement that prevents SQL Injection from occuring i.e. by passing reference values.
									#Now we have to bind the values with the references.
									$q->bindValue('name',$name);
									$q->bindValue('fname',$fname);
									$q->bindValue('address',$address);
									$q->bindValue('city',$city);
									$q->bindValue('age',$age);
									$q->bindValue('email',$email);
									$q->bindValue('donatedbg',$donatedbg);
									$q->bindValue('exchangebg',$exchangebg);
									$q->bindValue('dqnt',$dqnt);
									$q->bindValue('eqnt',$eqnt);
									$q->bindValue('mno',$mno);
									if($q->execute())
									{
										echo "<script>alert('Exchange Registration Successfull')</script>";
									}
									else
									{
										echo "<script>alert('Exchange Registration Failed')</script>";	
									}
								}
								else
								{
									echo "<script>alert('Exchange Blood Quantity Unavailable as per requirement!')</script>";
								}
							}
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