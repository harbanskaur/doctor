<?php	session_start();

	include('common/connect.php');
	require ('email.php');
 
	if(!empty($_SESSION['Login']))
	{
		header('home1.php');		
	}
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
		
		$appointment = "SELECT * FROM app WHERE id='" . $id . "'";
		$appointment = mysqli_query($connect, $appointment);
		$appointment = mysqli_fetch_assoc($appointment);
		//echo'<pre>';print_r($appointment);die;
		
		$patient = "SELECT * FROM patient WHERE pid='" . $appointment['pid'] . "'";
		$patient = mysqli_query($connect, $patient);
		$patient = mysqli_fetch_assoc($patient);
	//echo'<pre>';print_r($patient);die;
		if ($patient) {
			$body = 'Your appointment have been canceled <b> Thank you for booking!</b>';
			$response = sendEmail($patient['email'], $body);
			if($response) {
				$query="delete from app where id=$id";

				if(mysqli_query($connect,$query))
				{
					?>
					<script>
					alert ("record deleted");
					</script>
					<?php		
				}
				else
				{
					?>
					<script>
					alert ("record not deleted");
					</script>
					<?php
				}
			}
		} else {
			echo 'Patient not found.';
		}
	}	
 ?>
<html>
	<head>
		<title>  doctor side PAGE - 2  </title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header2.php')?>
			<!--right part starts-->
				<div class="right">
					<div class="head">
						<span><b id="about"> Appointments</b></span>
						<span id="date"> <b>&nbsp &nbsp Today</b><br> 10-20-23 </span>
					</div>
					<div class="enter">
						<form class="form">
							<table id="table1">
							<tr>
								<th colspan="7">Record of Appointment's </th>
							</tr>							
							<tr>
								<th>Patient</th>
								<th>Doctor</th>								
								<th>Time</th>
								<th>Date</th>		
								<th>Gender</th>
								<th>Cancel</th>							
							</tr>
							<?php
								$query="select a.*,p.gender from app a ,patient p where  a.pname=p.pname";
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result))
								{
								?>									
							<tr>
								<td><?php  echo $row['pname']?></td>
								<td><?php  echo $row['dname']?></td>							
								<td><?php  echo $row['time']?></td>
								<td><?php  echo $row['date']?></td>
								<td><?php  echo $row['gender']?></td>
								<td><a href="doctor2.php?did=<?php  echo $row['id']?>">Cancel</a></td>						
							</tr>						
							<?php
								}
								?>
						</table>
						</form>
					</tr>
					</div>
				</div> 	
				<!--right part ends-->
			</div>
			<!-- center part ends  -->
		<?php include('common/footer.php')?>
	</body>
</html>
