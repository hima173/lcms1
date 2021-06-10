<?php
session_start();
require_once('config.php');
if(isset($_SESSION['user_id'])&& ($_SESSION['user_id']!=="")){
$sessionid=$_SESSION['user_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
// $user_id=$_SESSION['user_id'];
$insert="INSERT into `decipher_lawyer_feedback_lawyer` (`user_id`,`name`,`email`,`subject`,`message`) VALUES ('$sessionid','$name','$email','$subject','$message')";
mysqli_query($conn,$insert);
header("Location:index.php");
} else {
header("Location:index.php");
}
?> 
