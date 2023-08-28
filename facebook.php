<?php
session_start();
include('common/connect.php');
include('vendor/autoload.php');

use Facebook\Facebook;
$admin = "admin";
$doctor = "doctor";
$patient = "patient";
$fb = new Facebook([
    'app_id' => '612215484315876',
    'app_secret' => 'd56e1c8bb532be15562744f96a03c053',
    'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

		$code = $_GET['code'];
		if (isset($code)) {
			// Handle Facebook's OAuth process
			try {
				$accessToken = $helper->getAccessToken();
				if (!empty($accessToken)) {
					//print_r($accessToken);die;
					// Exchange the short-lived access token for a long-lived one
					$oAuth2Client = $fb->getOAuth2Client();
					$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
					//print_r($longLivedAccessToken);die;
					// Set the long-lived access token
					$fb->setDefaultAccessToken($longLivedAccessToken);
	
					// Get user data
					$response = $fb->get('/me?fields=id,name,email');
					$userData = $response->getGraphUser();
					//echo '<pre>';print_r($userData);die;
					$email = $userData->getEmail();
					$name = $userData->getName();
	
					$query = "SELECT * FROM signup WHERE email='" . $email . "'";
					$result = mysqli_query($connect, $query);
	
					if ($res = mysqli_fetch_assoc($result)) {
						$_SESSION['Login'] = "set";
						$_SESSION['userdata'] = $res;
	
						if ($res['usertype'] == $admin) {
							header('location:doctor1.php');
						} elseif ($res['usertype'] == $doctor) {
							header('location:doctor3.php');
						} elseif ($res['usertype'] == $patient) {
							header('location:patient3.php');
						} else {
							echo "hello";
						}
					}
				}
			} catch (Facebook\Exceptions\FacebookResponseException $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
			} catch (Facebook\Exceptions\FacebookSDKException $e) {
				echo 'Facebook SDK returned an error: ' . $e->getMessage();
			}
		}