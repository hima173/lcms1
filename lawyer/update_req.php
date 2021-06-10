<?php 
if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
require_once('config.php');
if (isset($_POST['Approved']))
{
$status='Approved';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `status`='$status' where id='$req_id'";
mysqli_query($conn,$update);
}
if (isset($_POST['Rejected']))
{
$status='Rejected';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `status`='$status' where id='$req_id'";
//die;
mysqli_query($conn,$update);
}
header("Location:view_case.php");
}else{
	echo "Please <a href='login_lawyer.php'>Login</a> to Access This Page";
	}?>