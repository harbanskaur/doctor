<?php 
	session_start();
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
				<h1><i class="fa-solid fa-hospital-user fa-sm"></i><link rel="stylesheet"
				href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
				integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
				crossorigin="anonymous" referrerpolicy="no-referrer" /> DOCTOR's CLINIC</h1>
				<p>"All doctors treat, but a good doctor lets nature heal." <br>
				<a href="home2.php"><input type="submit" value="LOGIN" name="login" class="log" /></a>
				<a href="home3.php"><input type="submit" value="SIGNUP" name="signup" class="log" /></a></p>			
			</div>
		</div>	
	</body>
</html>