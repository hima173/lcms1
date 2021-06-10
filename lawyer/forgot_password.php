<?php
include('config.php');
include('session_timeout.php');

if(isset($_POST['recover'])){
 echo $now = time();
 echo $expired_time = mysqli_real_escape_string($conn,$_POST['expire_otp']);
 $email_otp = mysqli_real_escape_string($conn,$_POST['email_recover']);
//  echo mysqli_real_escape_string($conn,$_POST['expire_otp']);
  if($now < $expired_time)
  {
  // include('session_timeout.php');

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
$mail->setFrom(EMAIL, 'Password Recovered');
$mail->addAddress($email_otp);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Your Password Changed Successfully';
$mail->Body    = 'Your Account for Ait India is Recovered successfully. <b>'."</b><br>From Development Team";
// $mail->AltBody = 'Your new Password for student poetal is'.rand(100000,999999). "thanks and regards from mitesh chhatbar ";
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
 else {
  $confirm_pass =  mysqli_real_escape_string($conn,$_POST['confirm_password']);
  $credential = mysqli_real_escape_string($conn,$_POST['email_recover']);
  $pass = $confirm_pass;
  $user_otp = mysqli_real_escape_string($conn,$_POST['otp_final']);
  if($user_otp == mysqli_real_escape_string($conn,$_POST['otp'])){
  echo $query_update = "UPDATE decipher_lawyer_login_lawyer SET password = '$pass' WHERE email='$credential'";
  
      mysqli_query($conn, $query_update);
      echo  "<script>alert('Password Updated successfully.')</script>";
      echo "<script language='javascript' type='text/javascript'>location.href='javascript: window.history.go(-2)'  </script>";
  }

  else{
    echo  "<script>alert('OTP Not Valid.')</script>";
    echo "<script language='javascript' type='text/javascript'>location.href='javascript: window.history.go(-1)'  </script>";
  }
}
}
else{
  echo  "<script>alert('Your OTP has Expired.')</script>";
  echo "<script language='javascript' type='text/javascript'>location.href='javascript: window.history.go(-2)'  </script>";
}

}

?>

