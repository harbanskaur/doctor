<?php 	session_start();
	Include('common/connect.php');
	if(!empty($_POST['save']))
	{		
		$pname=$_POST['name'];
		$age=$_POST['age'];
		$height=$_POST['height'];
		$weight=$_POST['weight'];	
		$gender=$_POST['gender'];
		if(!empty($_POST['edited']))
		{
			$id=$_POST['edited'];
			$query="update patient set pname='$pname',age='$age',height='$height',weight='$weight',gender='$gender' where pid=$id";
		}
		else
		{
			$query="insert into patient (pname,age,height,weight,gender) values('$pname','$age','$height','$weight','$gender')";
		}
		if(mysqli_query($connect,$query))			
		{
			?>			
			<script>
			alert ("record inserted");
			</script>
			<?php		
		}
		else
		{
			?>
			<script>
			alert ("record not inserted");
			</script>
			<?php
		}
	}
	if(!empty($_GET['deid']))
	{
		$id=$_GET['deid'];
		$query="delete from patient where pid=$id";
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
	if(!empty($_GET['eid']))
	{
		$id=$_GET['eid'];
		$query="select * from patient where pid=$id";
		$result=mysqli_query($connect,$query);
		$row=mysqli_fetch_assoc($result);
	}
	if(!empty($_SESSION['Login']))
	{
		header('home1.php');
		
	}
?>
<html>
	<head>
		<title>admin page - 2  </title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header.php')?>
			<!--right part starts-->
			<div class="right">
				<div class="head">
					<span><b id="about">Patient's Info</b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br><?php echo date('d-m-y') ?></span>
				</div>
				<div class="enter">
					<form class="form" method="POST">
						<input type="hidden" name="edited" value="<?php if(!empty($row['pid'])) echo $row['pid']; ?>"/>
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
					<table id="table1">
							<tr>
								<th colspan="7">Record of Patients's </th>
							</tr>							
							<tr>
								<th>Patient-id </th>
								<th>Name</th>
								<th>Age</th>
								<th>Height</th>		
								<th>Weight</th>
								<th>Gender</th>
								<th>Delete </th>	
								<th>Edit</th>	
							</tr>
							<?php
								$query="select * from patient ";
								$result=mysqli_query($connect,$query);
								while($row=mysqli_fetch_assoc($result))
								{
									?>									
							<tr>
								<td><?php  echo $row['pid']?></td>
								<td><?php  echo $row['pname']?></td>
								<td><?php  echo $row['age']?></td>
								<td><?php  echo $row['height']?></td>
								<td><?php  echo $row['weight']?></td>
								<td><?php  echo $row['gender']?></td>
								<td><a href="patient.php?deid=<?php  echo $row['pid']?>">delete</a></td>
								<td><a href="patient.php?eid=<?php  echo $row['pid']?>">edit</a></td>
							</tr>							
							<?php
								}
								?>
						</table>
				</div>
			</div> 	
			<!--right part ends-->
		</div>
		<!-- center part ends  -->
	<?php Include('common/footer.php'); ?>
	</body>
</html>
