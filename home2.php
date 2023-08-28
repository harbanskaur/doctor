<?php  	session_start();
	include('common/connect.php');
	include('vendor/autoload.php');

	use Facebook\Facebook;

	$admin = "admin";
	$doctor = "doctor";
	$patient = "patient";

	$client = new Google_Client();
	$client->setClientId('52467794624-dtn53ql05j82lrbr5n94r1ulmq2s3u2p.apps.googleusercontent.com');
	$client->setClientSecret('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');
	$client->setRedirectUri('http://localhost/doctor/home2.php');
	$client->addScope("email");
	$client->addScope("profile");

	$fb = new Facebook([
		'app_id' => '612215484315876',
		'app_secret' => 'd56e1c8bb532be15562744f96a03c053',
		'default_graph_version' => 'v2.10',
	]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['email'];
	$loginUrl = $helper->getLoginUrl('http://localhost/doctor/facebook.php', $permissions);

	if (!empty($_GET['log'])) {
		session_destroy();
		header('location:home1.php');
		exit;
	}

	if (!empty($_POST['login'])) {
		$email = $_POST['email'];
		$password = $_POST['pass'];

		$query = "SELECT * FROM signup WHERE email='$email' AND password='$password'";
		$result = mysqli_query($connect, $query);

		if ($res = mysqli_fetch_assoc($result)) {
			$_SESSION['Login'] = "set";
			$_SESSION['userdata'] = $res;

			if ($res['usertype'] == $admin) {
				header('location:doctor.php');
			} elseif ($res['usertype'] == $doctor) {
				header('location:doctor3.php');
			} elseif ($res['usertype'] == $patient) {
				header('location:patient3.php');
			} else {
				echo "hello";
			}

			echo '<script>alert("Login successful");</script>';
		} else {
			echo '<script>alert("Login unsuccessful");</script>';
		}
	}

	if (isset($_GET['code'])) {
			$code = $_GET['code'];
			$state = $_GET['state'] ?? '';
			 if(isset($code)){
				// Handle Google's OAuth process
				$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
				$client->setAccessToken($token['access_token']);

				// Get user data
				$service = new Google_Service_Oauth2($client);
				$user = $service->userinfo->get();
				//$_SESSION['email'] = $user->email;
				
				$query="select * from signup where email='$user->email'";
				$result=mysqli_query($connect,$query);
				if($res=mysqli_fetch_assoc($result))			 
				{	
					//echo "<pre>";
					//print_r($res);
					//exit;
					$_SESSION['Login']="set";	
					$_SESSION['userdata'] = $res;
					if($res['usertype']==$admin)
					{				
						header('location:doctor1.php');
					}
					elseif($res['usertype']==$doctor)
					{
						header('location:doctor3.php');
					}
					elseif($res['usertype']==$patient)
					{
						header('location:patient3.php');
					}
					else
					{
						echo "hello";
					}
				} 
		}
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