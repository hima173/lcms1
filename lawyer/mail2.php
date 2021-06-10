<?php
session_start();
	require_once('config.php');
if (isset($_POST['Done']))
{
$Final_Status='Done';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `Final-Status`='$Final_Status' where id='$req_id'";

mysqli_query($conn,$update);

$select="SELECT `user_email` from `decipher_lawyer_user_applied_case` where id='$req_id'";
$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);
$email=$res['user_email'];
}
header("Location:final_case.php");
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Include PHPMailer library files
	require 'PHPMailer/Exception.php';
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';

	$mail = new PHPMailer;
	$mail1 = new PHPMailer;

	// SMTP configuration
	$mail->isSMTP();
	$mail->Host     = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'himavachhani@gmail.com';
	$mail->Password = 'hima123';
	$mail->SMTPSecure = 'tls';
	$mail->Port     = 587;

	$mail->setFrom('himavachhani@gmail.com', 'Decipher');

	// Add a recipient
	$mail->addAddress($email);

	// Email subject
	$mail->Subject = 'update about your case';

	// Set email format to HTML
	$mail->isHTML(true);

	// Email body content
	echo $mailContent = "
	    <h4>Hello</h4>
		
		<br>
		HEY your case has been ".$Final_Status."
		<br>
		<br>
		For futher queries,
		<br>
		Email Us:
		<br>
		<br>
		Thank you,

		<h4><br>
		HR Head</h4>";

	$mail->Body = $mailContent;

	// Send email
	if(!$mail->send()){
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}else{
	    echo 'Message has been sent';
	}	
?>