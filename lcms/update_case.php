<?php 
require_once('config.php');
$name=$_POST['name'];
$topic=$_POST['topic'];
$type=$_POST['type'];
$description=$_POST['description'];
$user_id=$_POST['user_id'];
$Date = $_POST['date'];
$update="UPDATE `decipher_lawyer_user_applied_case` set `name`='$name' , `topic`='$topic', `type`='$type' ,`Date`='$Date',`description`='$description' where id='$user_id'";
//die;
mysqli_query($conn,$update);
header("Location:view_case.php");
?>

