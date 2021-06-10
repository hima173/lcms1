<?php
	require_once('config.php');
	$case_id=$_POST['case_id'];
	$select="SELECT * from `decipher_lawyer_user_applied_case` where id=$case_id";
	$query=mysqli_query($conn, $select);
	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>