<?php
include('config.php');
$emp_verify = mysqli_real_escape_string($conn,$_POST['email']);
$otp = mysqli_real_escape_string($conn,$_POST['new_pass']);
if(isset($_POST['email_verification'])){
  
  $emp_verify = mysqli_real_escape_string($conn,$_POST['email']);
$query = "SELECT decipher_lawyer_login_user.email , decipher_lawyer_login_lawyer.email FROM decipher_lawyer_login_user, decipher_lawyer_login_lawyer where decipher_lawyer_login_lawyer.email = decipher_lawyer_login_user.email and  decipher_lawyer_login_lawyer.email = '$emp_verify'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($result);
  if($result->num_rows >= 1)
{
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
$mail->addAddress(mysqli_real_escape_string($conn,$_POST['email']));     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Your OTP';
$mail->Body    = 'Your OTP for LCMS PORTAL is <b>'.mysqli_real_escape_string($conn,$_POST['new_pass']). "</b><br>  From Development Team";
// $mail->AltBody = 'Your new Password for student poetal is'.rand(100000,999999). "thanks and regards from mitesh chhatbar ";
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
 $start_otp = time();
 $otp_expire = $start_otp + (10 * 60);
// else{
//   header('location:recover_password.php');
// }
//  else {
//   $pass =  mysqli_real_escape_string($conn,$_POST['new_pass']);
//   $email = mysqli_real_escape_string($conn,$_POST['email']);
//   $query = "UPDATE employee SET PASSWORD = '$pass' WHERE EMP_EMAIL='$email'";
//       mysqli_query($conn, $query);
//   header("location:login/finallogin1.php");
// }
// $email = $_POST['email'];
// $pass = $_POST['new_pass'];
// $query_updatepass = "UPDATE employee SET PASSWORD = '$pass' WHERE EMP_EMAIL = '$email'";
// mysqli_query($conn,$query_updatepass);
}
else{
  // echo  "<script>alert('Email does not exist or might be deactive.')</script>";
  // echo "<script language='javascript' type='text/javascript'>location.href='login/finallogin1.php'  </script>";
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AIT | Recover Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../css/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>LCMS</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form action="forgot_password.php" method="post" action="forgot_password.php">
          <input type="hidden" name="email_recover" value="<?php echo $emp_verify; ?>">
          <input type="hidden" name="otp_final" value="<?php echo $otp ?>">
          <input type="hidden" name="expire_otp" value="<?php echo $otp_expire ?>">
      <div class="input-group mb-3">
          <input type="password" name="otp" class="form-control" placeholder="OTP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password"><span id='message'></span>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="recover" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
        <a href="login_lawyer.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="jquery/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="jquery/adminlte.min.js"></script>
<script>
  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
</script>
</body>
</html>
