<?php	session_start();
	Include('common/connect.php');	
	if(!empty($_POST['save']))
	{
		$dname=$_POST['name'];
		$feild=$_POST['feild'];
		$email=$_POST['email'];
		$fees=$_POST['fees'];
		if(!empty($_POST['edited']))
		{
			$id=$_POST['edited'];
			$query="update doctor1 set dname='$dname',dfeild='$feild',demail='$email',dfee='$fees' where did=$id";
		}
		else
		{
			$query="insert into doctor1 (dname,dfeild,demail,dfee) values ('$dname','$feild','$email','$fees')";
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
		$query="delete from doctor1 where did=$id";
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
		$query="select * from doctor1 where did=$id";
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
		<title> admin page-1</title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header.php')?>	
			<!---right part starts here-->
			<div class="right">
				<div class="head">
					<span><b id="about">Doctor's Info </b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br> <?php echo date('d-m-y') ?> </span>
				</div>
				<div class="enter">
					<form class="form" method="post">
						<input type="hidden" name="edited" value="<?php if(!empty($row['did'])) echo $row['did']; ?>"/>
						<table class="doctor">
							<tr>
								<th colspan="2">Add New Doctor's Record Here<th>
							</tr>								
							<tr>
								<td>Enter Name :</td>
								<td><input type="text" name="name" required value="<?php if(!empty($row['dname'])) echo $row['dname']; ?>" /></td>
							</tr>
							<tr>
								<td>Select Feild :</td>
								<td><select name="feild"
								value="<?php if(!empty($row['dfeild'])) echo $row['dfeild']; ?>">
									<option readonly ></option>
									<option>Psychiatrist</option>
									<option>Dermatologist</option>
									<option>Dentist</option>
									<option>Gynecologist</option>
									<option>Skin</option>
									<option></option>
								</select><td>
							</tr>
							<tr>							
								<td>Enter Email :</td>
								<td><input type="email" name="email" required  value="<?php if(!empty($row['demail'])) echo $row['demail']; ?>"/><td>
							</tr>
							<tr>							
								<td>Consultation Fees :</td>
								<td><input type="text" name="fees" required value="500/-<?php if(!empty($row['dfee'])) echo $row['dfee']; ?>" /><td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="save" value="SAVE RECORD" /></td>								
							</tr>
						</table>
					</form>
					<table id="table1">
						<tr>
							<th colspan="7">Record of Doctor's </th>
						</tr>						
						<tr>
							<th>Doctor-id </th>
							<th>Name</th>
							<th>Feild</th>
							<th>Email</th>		
							<th>Consultation Fees</th>
							<th>Delete </th>	
							<th>Edit</th>	
						</tr>
						<?php
							$query="select * from doctor1 ";
							$result=mysqli_query($connect,$query);
							while($row=mysqli_fetch_assoc($result))
							{
							?>								
						<tr>
							<td><?php  echo $row['did']?></td>
							<td><?php  echo $row['dname']?></td>
							<td><?php  echo $row['dfeild']?></td>
							<td><?php  echo $row['demail']?></td>
							<td><?php  echo $row['dfee']?></td>
							<td><a href="doctor.php?deid=<?php  echo $row['did']?>">delete</a></td>
							<td><a href="doctor.php?eid=<?php  echo $row['did']?>">edit</a></td>
						</tr>
						
						<?php
							}
							?>
					</table>
				</div>
			</div> 	
			<!---right part ends here-->
		</div>								
		<!--center part ends here-->			
	<?php Include('common/footer.php'); ?>
	</body>
</html>
