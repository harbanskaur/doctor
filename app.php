<?php	session_start();
	Include('common/connect.php');
	if(!empty($_GET['did']))
	{
		$id=$_GET['did'];
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
	if(!empty($_SESSION['Login']))
	{
		header('home1.php');
	}
	
	require('email.php');
	if(isset($_POST['save'])) {
		//$email = $_POST['email'];
		$patientId = $_POST['patient'];
		
		$query = "SELECT * FROM patient WHERE pid='" . $patientId . "'";
		$result = mysqli_query($connect, $query);
		$result = mysqli_query($connect, $query);
	
		if ($res = mysqli_fetch_assoc($result)) {
		
			$response = sendEmail($res['email']);
				if($response) {
					
					$docname=$_POST['doctor'];
					$fees=$_POST['fees'];
					$patname=$res['pname'];
					$time=$_POST['time'];
					$date=$_POST['date'];				
					$query="insert into app (dname,fee,pname,time,date, pid) values ('$docname','$fees','$patname','$time','$date', '$patientId')";		
					if(mysqli_query($connect,$query))
					{
						?>
						<script>
						alert ("Appointment Booked ");
						</script>
						<?php		
					}
					else
					{
						?>
						<script>
						alert ("Appointment Not Booked ");
						</script>
						<?php
					}
					?>
						<script>
							alert("You received an email");
						</script>
						<?php
					} 
					else 
					{							
						echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
					}
		}
		

	}

?>



<html>
	<head>
		<title>admin page-3 </title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header.php')?>	
		<!--right part starts-->
			<div class="right">
				<div class="head">
					<span><b id="about">Appointment</b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br> <?php echo date('d-m-y') ?> </span>
				</div>
				<div class="enter">
					<form class="form" method="POST">					
					     <table class="doctor">
							<tr>
								<th colspan="2">Book New Appointment Here<th>								
							</tr>
							<tr>
								<td> Doctor :</td>
								<td>
									<select name="doctor" >
										<option>select name </option>
										<?php
											
											$query ="select did , dname from doctor1 ";
											$result=mysqli_query($connect,$query);
											while ($row=mysqli_fetch_assoc($result))
											{												
										?>
											<option value="<?php echo $row['dname']?>"> <?php echo $row['dname']?></option>
										<?php 
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td>Fees:</td>								
								<td><input type="text" name="fees" value="500/-"/>
							<tr>
								<td>  Patient: </td>
								<td>
									<select name="patient" >
										<option>select name</option>
										<?php 
											$query ="select pname,pid from patient";
											$result=mysqli_query($connect,$query);
											while ($row=mysqli_fetch_assoc($result))
											{
										?>
											<option value="<?php echo $row['pid']?>"> <?php echo $row['pname']?></option>
										<?php 
											}
										?>
									</select>
								</td>
							</tr>
							<tr>																															
								<td colspan="2" ><a href="patient.php"><input type="submit" name="new" value="Create Patient" id="save1"/></a><td>				
							</tr>
							<tr>							
								<td>Time Slot :</td>																	
								<td><input type="time" name="time" required  /><td>				
							</tr>
							<tr>							
								<td>Date :</td>
								<td><input type="date" name="date" required  /> <td>
							</tr>							
							<tr>
								<td colspan="2"><input type="submit" name="save" value="BOOK NOW" id="save1"/></td>								
							</tr>
						</table>						
					</form>								
				</div>
			</div> 	
			<!--right part starts-->
		</div>
		<!-- center part ends  -->
	<?php include('common/footer.php')?>
	</body>
</html>
