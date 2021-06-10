<?php 
require_once('config.php');
$select="SELECT * FROM `decipher_lawyer_login_user`";
$query=mysqli_query($conn, $select);
$user_count=mysqli_num_rows($query);

$select1="SELECT * FROM `decipher_lawyer_user_applied_case`";
$query1=mysqli_query($conn, $select1);
$case_count=mysqli_num_rows($query1);
$select2="SELECT * FROM `decipher_lawyer_login_lawyer`";
$query2=mysqli_query($conn, $select2);
$lawyer_count=mysqli_num_rows($query2);
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Home</h1>
                    </div>
                </div>
            </div>
</div>
<div id="container-wrapper" >
<div class="container-fluid col-4">
<table class="table table-bordered mt-3">
  <thead class="thead-dark text-center">
    <tr>
		<th scope="col">TOTAL USERS</th>
		<th scope="col">TOTAL CASES</th>
    <th scope="col">LAWYER REQ</th>
    </tr>
  </thead>
  <tbody class="text-center">
		<td><?php echo $user_count ?></td>
		<td><?php echo $case_count ?></td>
    <td><?php echo $lawyer_count ?></td>
  </tbody>
</div>
</div>