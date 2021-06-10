<?php 
	require_once('config.php');
	$email=$_POST['email'];
	$password=$_POST['password'];
	$select="SELECT * FROM `decipher_lawyer_login_user` where `email`='$email' && `password`='$password'";
	//die;
	$query=mysqli_query($conn, $select);
	$res=mysqli_fetch_array($query);
	
	//echo mysqli_num_rows($query);
	if(mysqli_num_rows($query)>0){
		session_start();
		$_SESSION['user_id']=$res['id'];
		$_SESSION['user_name']=$res['first_name'];
		$_SESSION['user_email']=$res['email'];
		$_SESSION['start'] = time(); // Taking now logged in time.
    	$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
		header('Location:index.php');
	}
	else{
		header("Location:login.php?login_error=1");
	}
?>