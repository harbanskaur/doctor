<?php
		
		require 'src/Exception.php';
		require 'src/PHPMailer.php';
		require 'src/SMTP.php';

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\SMTP;
		use PHPMailer\PHPMailer\Exception;
		
		function sendEmail($email, $body = null) {
		//Create an instance; passing `true` enables exceptions
			$mail = new PHPMailer(true);
				try {
					//Server settings
					//$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
					$mail->SMTPDebug = 0;
					$mail->isSMTP();                                            //Send using SMTP
					$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
					$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
					$mail->Username   = 'harbanskaur1602@gmail.com';                     //SMTP username
					$mail->Password   = 'nrikalrdnpyhrrdo';                               //SMTP password
					$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
					$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

					//Recipients
					$mail->setFrom('harbanskaur1602@gmail.com', 'clinic');
					$mail->addAddress($email);
					// $mail->addAddress('hj252214@gmail.com', 'harshit');     //Add a recipient
					// $mail->addAddress('dknov2000@gmail.com');               //Name is optional
					$mail->addReplyTo('harbanskaur1602@gmail.com', 'Information');
					// $mail->addCC('cc@example.com');
					// $mail->addBCC('bcc@example.com');

					//Attachments
					// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
					// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

					//Content
					$mail->isHTML(true);                                  //Set email format to HTML
					$mail->Subject = 'Reminder';
					if($body) {
						$mail->Body = $body;
					} else {
						$mail->Body    = 'Your appointment have been booked <b> Thank you for booking!</b>';
					}
					
					$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

					 $mail->send();
					return true;
				}	 
				catch (Exception $e) 
				{
					return false;
				}
		}
?>