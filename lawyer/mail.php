<?php
session_start();
	require_once('config.php');
if (isset($_POST['Approved']))
{
$lawyer_id = $_SESSION['user_id'];
$status='Approved';
$req_id=$_POST['req_id'];
echo $update="UPDATE `decipher_lawyer_user_applied_case` set `status`='$status', `lawyer_id`= $lawyer_id where id='$req_id'";

mysqli_query($conn,$update);
$select="SELECT `user_email` from `decipher_lawyer_user_applied_case` where id='$req_id'";
$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);
$email=$res['user_email'];

}
if (isset($_POST['Rejected']))
{
$lawyer_id = $_SESSION['user_id'];
$status='Rejected';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `status`='$status',`lawyer_id`= $lawyer_id where id='$req_id'";
//die;
mysqli_query($conn,$update);
$select="SELECT `user_email` from `decipher_lawyer_user_applied_case` where id='$req_id'";
$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query);
$email=$res['user_email'];
}



require '../phpmailer/class.phpmailer.php';
require '../phpmailer/class.smtp.php';
require '../PHPMailerAutoload.php';
require '../credential.php';
$mail = new PHPMailer;
// $mail->SMTPDebug = 4;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASSWORD;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
$mail->setFrom(EMAIL, 'LCMS OTP');
$mail->addAddress(mysqli_real_escape_string($conn,$email));     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Your OTP';
$mail->Body    = "<h4>Hello</h4>
<br>
HEY your case has been ".$status."
<br>
For futher queries,
<br>
Email Us:
<br>
Thank you,
<h4><br>
HR Head</h4>";
// $mail->AltBody = 'Your new Password for student poetal is'.rand(100000,999999). "thanks and regards from mitesh chhatbar ";
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
else{
	echo 'Message has been sent';
	header("Location:view_case.php");
}	
?>