<?php 
require_once('config.php');
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$user_type=$_POST['user_type'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$state=$_POST['state'];
$city=$_POST['city'];
$occupation=$_POST['occupation'];
$phone_no=$_POST['phone_no'];
$password=$_POST['password'];
$Confirm_password=$_POST['Confirm_password'];
$insert="INSERT into `decipher_lawyer_login_user` (`first_name`,`last_name`,`email`,'user_type','gender','address','state','city','occupation','phone_no',`password`,'Confirm_password') VALUES ('$first_name','$last_name','$email','$user_type','$gender','$address','$state','$city','$occupation','$phone_no','$password','$Confirm_password')";
mysqli_query($conn,$insert);
header("Location:index.php");
?>