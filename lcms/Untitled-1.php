<?php
	require_once('config.php');
	$case_id=$_POST['case_id'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$topic=$_POST['topic'];
	$date=$_POST['date'];
	$description=$_POST['description'];
	$update="UPDATE `decipher_lawyer_user_applied_case` SET `name`=`$name`,`topic`='$topic',`Date`='$date',`type`='$type',`description`='$description' WHERE `id`=$case_id";
	$query=mysqli_query($conn, $select);
	$res=mysqli_fetch_assoc($query);
	echo json_encode($res);
?>