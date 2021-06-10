<?php 
require_once('config.php');
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$Gender=$_POST['Gender'];
$DateOfBirth=$_POST['Date Of Birth'];
$Qualification=$_POST['Qualification'];
$Address=$_POST['Address'];
$City=$_POST['City'];
$State=$_POST['State'];
$Phoneno=$_POST['Phone No'];
$password=$_POST['password'];
$Confirmpassword=$_POST['Confirm password'];
$status="Pending";
$insert="INSERT into `decipher_lawyer_login_lawyer` (`first_name`,`last_name`,`email`,'Gender','Date Of Birth','Qualification','Address','City','State','Phone No',`password`,'confirm password',`status`) VALUES ('$first_name','$last_name','$email','$Gender','$DateOfBirth','$Qualification','$Address','$City','$State','$Phoneno','$password','$Confirmpassword','$status')";
mysqli_query($conn,$insert);

header("Location:index.php");
?>