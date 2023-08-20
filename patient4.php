<?php session_start();
	include('common/connect.php');
	if(!empty($_POST['save2']))
	{
		$docname=$_POST['doctor'];
		$fees=$_POST['fees'];
		$patname=$_POST['patient'];
		$time=$_POST['time'];
		$date=$_POST['date'];	
		$query="insert into app (dname,fee,pname,time,date) values ('$docname','$fees','$patname','$time','$date')";
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
	}
	if(!empty($_POST['save']))
	{
		$pname=$_POST['name'];
		$age=$_POST['age'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];	
		$gender=$_POST['gender'];
		$query="insert into patient (pname,age,height,weight,gender) values('$pname','$age','$height','$weight','$gender')";
		if(mysqli_query($connect,$query))
		{
			?>
			<script>
			alert ("Record Inserted ");
			</script>
			<?php		
		}
		else
		{
			?>
			<script>
			alert ("Record Not Inserted");
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
		<title>patient  </title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header3.php')?>
		<!--right part starts-->
			<div class="right">
				<div class="head">
					<span><b id="about">Book Appointment</b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br> 10-20-23 </span>
				</div>
				<div class="enter">
					<form class="form" method="POST">
					<table class="doctor">
							<tr>
								<th colspan="2">Add New Patient Record Here<th>								
							</tr>
							<tr>
								<td>Enter Name :</td>
								<td><input type="text" name="name" required value="<?php if(!empty($row['pname'])) echo $row['pname']; ?>"/></td>
							</tr>
							<tr>
								<td>Enter Age  :</td>
								<td><input type="text" name="age" required value="<?php if(!empty($row['age'])) echo $row['age']; ?>"/><td>
							</tr>
							<tr>							
								<td>Enter Height :</td>
								<td><input type="text" name="height" required value="<?php if(!empty($row['height'])) echo $row['height']; ?>"/><td>								
							</tr>
							<tr>	
								<td>Enter Weight :</td>
								<td><input type="text" name="weight" required value="<?php if(!empty($row['weight'])) echo $row['weight']; ?>"/> <td>
							</tr>
							<tr>							
								<td>Gender :</td>
								<td><select name="gender">
									<option readonly ></option>
									<option>Female</option>
									<option>Male</option>
									<option>Other</option>
								</select><td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="save" value="SAVE RECORD" id="save1"/></td>								
							</tr>							
						</table>
					</form>
					<form method="POST" class="form">
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
											$query ="select pname from patient";
											$result=mysqli_query($connect,$query);
											while ($row=mysqli_fetch_assoc($result))
											{
										?>
											<option value="<?php echo $row['pname']?>"> <?php echo $row['pname']?></option>
										<?php 
											}
										?>
									</select>
								</td>
							</tr>
							<tr>																															
								<td colspan="2" ><a href="patient.php"><input type="submit" name="new" value="Create Patient"  id="save3"/></a><td>				
							</tr>
							<tr>							
								<td>Time Slot :</td>																	
								<td><input type="time" name="time" required /><td>				
							</tr>
							<tr>							
								<td>Date :</td>
								<td><input type="date" name="date" required /> <td>
							</tr>
							
							<tr>
								<td colspan="2"><input type="submit" name="save2" value="SAVE RECORD" id="save3"/></td>
								
							</tr>
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
