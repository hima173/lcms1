<?php 
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){	
	require_once('config.php');
	$user_id=$_GET['user_id'];
	$delete="DELETE FROM decipher_lawyer_user_applied_case where `id`=$user_id";
	mysqli_query($conn, $delete);
	header("Location:view_case.php?msg=2");
}else{
	echo "Please <a href='login.php'>Login</a> to Access This Page";
	}?>