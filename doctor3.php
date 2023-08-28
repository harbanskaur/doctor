<?php 	session_start(); 
	include('common/connect.php');	
	if(!empty($_SESSION['Login']))
	{
		header('home1.php');		
	}
?>
<html>
	<head>
		<title>  doctor side PAGE - 1 </title>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<?php include('common/header2.php')?>
			<!--right part starts-->
				<div class="right">
					<div class="head">
						<span><b id="about"> Patients Info </b></span>
						<span id="date"> <b>&nbsp &nbsp Today</b><br> 10-20-23 </span>
					</div>
					<div class="enter">
						<form class="form">
							<table id="table1">
							<tr>
								<th colspan="7" id="search"><input type="text" name="s" placeholder="Search by patient name"/>
												<input type="submit" value="Search"/>
								</th>
							</tr>							
							<tr>
								<th>Patient-id</th>
								<th>Name</th>
								<th>Age</th>
								<th>Height</th>		
								<th>Weight</th>
								<th>Email</th>
							</tr>
							<?php
								if(!empty($_GET['s']))
								{
									$searchname=$_GET['s'];
									$query="select * from patient where pname like '%$searchname%'";
								}
								else
								{	
									$query="select * from patient ";
								}
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
								<td><?php  echo $row['email']?></td>
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
