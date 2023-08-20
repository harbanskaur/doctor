<!-- main container starts here -->
	<div class="home1">
		<!--headpart starts -->
		<div class="main1">
			<div class="head1">									
				<h1><i class="fa-solid fa-hospital-user fa-sm"></i><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> DOCTOR's CLINIC</h1>
			</div>							
		</div>
		<!--headpart ends-->								
		<!-- center part starts  -->
		<div class="center1">
			<!---left part starts here-->
			<div class="left">					
				<div class="button">
					<a href="doctor.php"><input type="button" value="User : Doctor  "/><br></a>
					<a href="doctor3.php"><input type="button" value="Patients"/><br></a>						
					<a href="doctor2.php"><input type="button" value="Appointments"/><br></a>
					<!--<a href="password2.php"><input type="button" value="Change Password"/><br></a>-->
					<?php
					if(empty($_SESSION['Login']))
					{
						?>
							<a href="home2.php"><input type="button" name="login" value="Login"></a>
						<?php
					}
					else
					{
						?>
							<a href="home1.php?log=1"><input type="button" name="logout" value="Logout"></a>
						<?php
					}
					?>																						
				</div>
			</div>	
			<!---left part ends here-->