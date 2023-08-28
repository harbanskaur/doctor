 <?php 	session_start();
	include('common/connect.php');	
	if(!empty($_POST['Login']))
	{
		header('location:home1.php');		
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
							<th>SELECT USER </th>
						</tr>
						<tr>
							<td><a href="doctor1.php"><input type="button" name="" value="ADMIN SIDE"/></a></td>
						</tr>
						<tr>
							<td><a href="doctor3.php"><input type="button" name="" value="DOCTOR SIDE"/></a></td>
						</tr>
						<tr>						
							<td><a href="patient3.php"><input type="button" name="" value="PATIENT SIDE"/></a></td>
						</tr>
						<tr>						
							<td id="or">OR</td>
						</tr>
						<tr>
							<td>
							<?php
							if(empty($_SESSION['Login']))
							{
								?>
									<a href="home2.php"><input type="button" name="login" value="LOGIN"></a>
								<?php
							}
							else
							{
								?>
									<a href="home1.php?log=1"><input type="button" name="logout" value="LOGOUT"></a>
								<?php
							}
							?>	
							</td>
						</tr>	
					</table>
				</form>								
			</div>
		</div>	
	</body>
</html>