<?php
session_start();
require_once('config.php');
if(isset($_SESSION['user_id'])&& ($_SESSION['user_id']!=="")){
$sessionid=$_SESSION['user_id'];
$email=$_SESSION['user_email'];
$name=$_POST['name'];
$topic=$_POST['topic'];
$type=$_POST['type'];
$date=$_POST['date'];
$description=$_POST['description'];
// $user_id=$_SESSION['user_id'];
$status="Pending";
$Final_Status="Pending";
echo$insert="INSERT into `decipher_lawyer_user_applied_case` (`user_id`,`user_email`,`name`,`topic`,`type`,`date`,`description`,`status`,`Final-Status`) VALUES ('$sessionid','$email','$name','$topic','$type','$date','$description','$status','$Final_Status')";
mysqli_query($conn,$insert);
header("Location:view_case.php");
} else {
	
	header("Location:login.php");
}
?> 
