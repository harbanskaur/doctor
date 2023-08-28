<?php	session_start();
		include('common/connect.php');
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
					<span><b id="about">Doctor's Info</b></span>
					<span id="date"> <b>&nbsp &nbsp Today</b><br> 10-20-23 </span>
				</div>
				<div class="enter">
					<form class="form">
					     <table id="table1">
							<tr>
								<th colspan="7">Doctor's Info</th>
							</tr>
							<tr>
								<th>Doctor-id </th>
								<th>Name</th>
								<th>Feild</th>
								<th>Email</th>		
								<th>Consultation Fees</th>									
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
