<?php 
require_once('config.php');
if (isset($_POST['Done']))
{
$Final_Status='Done';
$req_id=$_POST['req_id'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `Final-Status`='$Final_Status' where id='$req_id'";

mysqli_query($conn,$update);
}
header("Location:final_case.php");
?>