<?php
session_start();
	require 'PHPMailerAutoload.php';
	$mail = new PHPMailer;

	$mail->SMTPDebug = 2;                               // Enable verbose debug output

    #$emailBody = "<div>" . $user["username"] . ",<br><br><p>Click this link to recover your password<br><a href='" . PROJECT_HOME . "reset_password.php?name=" . $user["username"] . "'>" . PROJECT_HOME . "reset_password.php?name=" . $user["username"] . "</a><br><br></p>Regards,<br> Admin.</div>";
 $random = rand();
 $_SESSION["random"] = $random;
 $emailBody = "Please enter the below OTP on the given link<br>'$random'Click on this link to recover your password<br>localhost/forgetPassword/resetPassword.php";
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'abhishek23dawas@gmail.com';                 // SMTP username
	$mail->Password = 'abhi123@';                           // SMTP password
	$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                    // TCP port to connect to

	$mail->setFrom('abhishek23dawas@gmail.com', 'Mail test');
	//$add = "2016csb1107@iitrpr.ac.in";
	$mail->AddAddress($user["email"]);     // Add a recipient

	$mail->addReplyTo('abhishekdawas10@gmail.com');


	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Forgot Password Recovery';
	$mail->Body    = '<div>This is the HTML message body <b>in bold!</b></div>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->MsgHTML($emailBody);
   // $mail->Body    = $random;
	if(!$mail->send())
		{
		echo 'Message could not be sent.';
		echo 'Mailer Error: ' . $mail->ErrorInfo;
		}
	else 
		{
		echo 'Message has been sent';
		}
	

?>

