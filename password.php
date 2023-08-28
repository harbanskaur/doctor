<?php  session_start();
	Include('common/connect.php');
	if(!empty($_POST['save']))
	{
		$op=$_POST['oldpass'];
		$np=$_POST['newpass'];
		$cnp=$_POST['cnewpass'];
		if($np==$cnp)
		{
			$query="select * from signup where password='$op'";
			$result=mysqli_query($connect,$query);
			$count=mysqli_num_rows($result);
			if($count>0)
			{
				$query="update signup set password='$np'";
				mysqli_query($connect,$query);
				?>
					<script>
						alert("Password updated successfully");
					</script>
				<?php
			}
			else
			{
				?>
					<script>
						alert("Old Password does not match");
					</script>
				<?php
			}
		}
		else
		{
			?>
				<script>
					alert("New Password and Confirm New Password does not match");
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
		<title>admin page-5</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header.php')?>
			<div class="right">
				<div class="head">
					<span><b id="about">Change Password </b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br> 10-20-23 </span>
				</div>
				<div class="enter">
					<form class="form" method="POST">
					     <table class="doctor">
							<tr>
								<th colspan="2">Change Password Here<th>
								
							<tr>
							<tr>
								<td>Enter Old Password :</td>
								<td><input type="text" name="oldpass" /></td>
							</tr>
							<tr>
								<td>Enter New Password  :</td>
								<td><input type="text" name="newpass" /><td>
							</tr>	
							<tr>
								<td>Confirm New Password  :</td>
								<td><input type="text" name="cnewpass" /><td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="save" value="CHANGE" id="save2"/></td>
								
							</tr>
						</table>
						
					</form>
				</tr>
				</div>
			</div> 	
			 	
			</div>
			<!-- center part ends  -->
			<?php include('common/footer.php')?>
	</body>
</html>
