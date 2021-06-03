<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

if(isset($_POST["email"]))
{
	$emailTo = $_POST["email"];
	
	$code = uniqid(true);
	$query = mysqli_query($con, "INSERT INTO resetpassword(code, email) VALUES ('$code', '$emailTo')");
	if (!$query)
	{
		exit("Error");
	}
	
	$mail = new PHPMailer(true);
	try {
		//Server settings
		$mail->isSMTP();                                            
		$mail->Host       = 'smtp.gmail.com';                    
		$mail->SMTPAuth   = true;                                   
		$mail->Username   = 'wynnylimweiyi@gmail.com';                    
		$mail->Password   = 'Wynnylimweiyi19980106';                             
		$mail->SMTPSecure = 'ssl';        
		$mail->Port       = 465;                                   

		//Recipients
		$mail->setFrom('wynnylimweiyi@gmail.com', 'Web Cam');
		$mail->addAddress($emailTo);     
		$mail->addReplyTo('no-reply@webCam.com', 'Information');

		// Content
		$url = "http://" . $_SERVER["HTTP_HOST"]. dirname($_SERVER["PHP_SELF"]). "/resetPassword.php?code=$code";
		$mail->isHTML(true);                                 
		$mail->Subject = 'Password Reset Link';
		$mail->Body    = "<h1> You've requested a password reset. </h1>
							Please <a href = '$url' >CLICK HERE </a> to reset.";
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$mail->send();
		echo "<script type='text/javascript'>alert('Password reset link has been sent to your mailbox');
			</script>";
	} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


?>


