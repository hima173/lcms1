<?php 
require_once('config.php');
if (isset($_POST['Approved']))
{
$status='Approved';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_login_lawyer` set `status`='$status' where id='$req_id'";

mysqli_query($conn,$update);
}
if (isset($_POST['Rejected']))
{
$status='Rejected';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_login_lawyer` set `status`='$status' where id='$req_id'";
//die;
mysqli_query($conn,$update);
}
header("Location:view_lawyer_req.php");
?>