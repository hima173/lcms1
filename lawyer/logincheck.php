<?php 
	require_once('config.php');
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select="SELECT * FROM `decipher_lawyer_login_lawyer` where `email`='$email' && `password`='$password'";
	//die;
	$query=mysqli_query($conn, $select);
	$res=mysqli_fetch_array($query);
	
	//echo mysqli_num_rows($query);
	if(mysqli_num_rows($query)>0){
		$select1="SELECT * FROM `decipher_lawyer_login_lawyer`";
	//die;
		$query1=mysqli_query($conn, $select1);
		$res1=mysqli_fetch_assoc($query1);
		$status=$res['status'];
		$select2= "SELECT * FROM `decipher_lawyer_login_lawyer` where `status`=$status";
		if ($status=="Approved"){
			session_start();
			$_SESSION['user_id']=$res['id'];
			$_SESSION['user_name']=$res['first_name'];
			$_SESSION['email']=$res['email'];
			$_SESSION['start'] = time(); // Taking now logged in time.
    	$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
			header('Location:index.php');
		}else if($status="Rejected"){
		?> 
		
		<?php
		header("Location:login_lawyer.php?login_error=2");
	}
	} 
	else{
		header("Location:login_lawyer.php?login_error=1");
	}
?>
