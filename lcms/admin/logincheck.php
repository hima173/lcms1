<?php 
	require_once('config.php');
	$username=$_POST['username'];
	$password=$_POST['password'];
	$select="SELECT * FROM `decipher_lawyer_login_admin` where `username`='$username' && `password`='$password'";
	//die;
	$query=mysqli_query($conn, $select);
	$res=mysqli_fetch_array($query);
	
	//echo mysqli_num_rows($query);
	if(mysqli_num_rows($query)>0){
		session_start();
		$_SESSION['user_id']=$res['id'];
		$_SESSION['user_name']=$res['name'];
		$_SESSION['start'] = time(); // Taking now logged in time.
    	$_SESSION['expire'] = $_SESSION['start'] + (60 * 60);
		header('Location:dashboard.php');
	}
	else{
		header("Location:index.php?login_error=1");
	}
?>