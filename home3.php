<?php 	session_start();
	Include('common/connect.php');
	if(!empty($_POST['signup']))
	{
		$user=$_POST['select'];
		$username=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$cpassword=$_POST['cpass'];
		$query="insert into signup (username,email,password,cpassword,usertype) values('$username','$email','$password','$cpassword','$user')";
		if(mysqli_query($connect,$query))
		{
			?>
			<script>
			alert("login now");
			window.location.href='home2.php';
			</script>			
			<?php				
		}
		else
		{
			?>
			<script>
			alert("signup unccessful");
			</script>
			<?php 
		}
	}
	if(!empty($_SESSION['Login']))
	{
		header('home1.php');	
	}
?>
<html>
	<head>
	<title> home page </title>
	<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>	
		<div class="home">
			<div class="head1">									
				<h1><i class="fa-solid fa-hospital-user fa-sm"></i><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> DOCTOR's CLINIC</h1>
				<form class="google" method="POST">
					<table id="google">
						<tr>
							<th>SIGNUP HERE</th>
						</tr>
						<tr>
							<td><select name="select">
							<option disabled selected  hidden id="hello">Select User Side</option>
							<option value="doctor">Doctor</option>
							<option value="patient">Patient</option>
							</select></td>
						</tr>
						<tr>
							<td><input type="text" name="name" placeholder="Username" required /></td>
						</tr>
						<tr>
							<td><input type="email" name="email" placeholder="Email" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="pass" placeholder=" Set Password" required /></td>
						</tr>
						<tr>
							<td><input type="text" name="cpass" placeholder="Confirm Password" required /></td>
						</tr>
						<tr>						
							<td><input type="submit" name="signup" value="SIGNUP" id="sign"/></td>
						</tr>
		
					</table>
				</form>	
				<form class="google2">
					<table id="google2">
						<tr>						
							<td>Already  have an account ?</td>
						</tr>
						<tr>						
							<td><a href="home2.php"><input type="button" name="" value="LOGIN"/></a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
	</body>
</html>