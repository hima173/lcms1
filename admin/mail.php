<?php
session_start();
	require_once('config.php');
if (isset($_POST['Approved']))
{
$status='Approved';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_login_lawyer` set `status`='$status' where id='$req_id'";

mysqli_query($conn,$update);
$select="SELECT `email` from `decipher_lawyer_login_lawyer` where id='$req_id'";
$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);
$email=$res['email'];

}
if (isset($_POST['Rejected']))
{
$status='Rejected';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_login_lawyer` set `status`='$status' where id='$req_id'";
//die;
mysqli_query($conn,$update);
$select="SELECT `email` from `decipher_lawyer_login_lawyer` where id='$req_id'";
$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);
$email=$res['email'];
}
header("Location:view_lawyer_req.php");

	
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
		HEY your case has been ".$status."
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