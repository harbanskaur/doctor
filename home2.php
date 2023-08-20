<?php 	session_start();
	Include('common/connect.php');
	if(!empty($_POST['login']))
	{	
		$username=$_POST['user'];
		$email=$_POST['email'];
		$password=$_POST['pass'];
		$query="select * from signup where  username='$username' and email='$email' and password='$password'";
		$result=mysqli_query($connect,$query);
		if(mysqli_fetch_assoc($result))			 
		{	
			$_SESSION['Login']="set";										
			?>
			<script>
			alert("login successful");
			window.location.href='doctor.php';
			</script>
			<?php	
		}
		else
		{
			?>
			<script>
			alert(" login unsuccessful");
			</script>
			<?php 
		}
	}
	
	Include('vendor/autoload.php');
	// access Google API
	$client = new Google_Client();
	$client->setClientId('52467794624-ikhh73cunhf6imrojsa0jpgm1u0lccp6.apps.googleusercontent.com');
	$client->setClientSecret('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');
	$client->setRedirectUri('http://localhost/doctor/doctor.php');
	$client->addScope("email");
	$client->addScope("profile");
	$_SESSION['Login']="set";	
	// access facebook API
	$fb = new Facebook\Facebook([
	  'app_id' => '612215484315876',
	  'app_secret' => 'd56e1c8bb532be15562744f96a03c053',
	  'default_graph_version' => 'v2.10',
	]);	
	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email']; 
	$loginUrl = $helper->getLoginUrl('http://localhost/doctor/doctor.php', $permissions);
	$_SESSION['Login']="set";	
	if(!empty($_GET['log']))
	{
		session_destroy();
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
							<th>LOGIN HERE</th>
						</tr>
						<tr>
							<td><input type="text" name="user" placeholder="Username"/></td>
						</tr>
						<tr>
							<td><input type="email" name="email" placeholder="Email"/></td>
						</tr>
						<tr>
							<td><input type="password" name="pass" placeholder="Password"/></td>
						</tr>
						
						<tr>						
							<td><input type="submit" name="login" value="LOGIN" id="sign"/></td>
						</tr>					
						<tr>				
							<td>OR</td>
						</tr>
						<tr>					
							<td><a href="<?php echo $client->createAuthUrl(); ?>"><input type="button" name="" value="LOGIN WITH - GOOGLE"/></a></td>
						</tr>
						<tr>					
						<td><a href="<?php echo $loginUrl; ?>"><input type="button" name="" value="LOGIN WITH - FACEBOOK" /></a>
						
						</td>
						</tr>
					</table>
				</form>
				<form class="google2">
					<table id="google2">
						<tr>						
							<td>Don't have an account ?</td>
						</tr>
						<tr>						
							<td><a href="home3.php"><input type="button" name="" value="SIGNUP"/></a></td>
						</tr>
					</table>
				</form>
			</div>
		</div>	
	</body>
</html>