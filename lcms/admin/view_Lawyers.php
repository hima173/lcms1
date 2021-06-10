<?php 
session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	require_once('header.php'); 
	require_once('config.php');
	$select="SELECT * FROM `decipher_lawyer_login_user`";
	$query=mysqli_query($conn,$select);
?>
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Home</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Home</a></li>
                            <li class="active">View Lawyers</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
<div id="content-wrapper">
    <div class="container-fluid">
    <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fa fa-table"></i>
			View Lawyers Table</div>
         <div class="card-body">
            <div class="table-responsive">
				<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>MobileNo</th>
                    <th>DateOfBirth</th>
                    <th>Qualification</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S.NO.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>MobileNo</th>
                    <th>DateOfBirth</th>
                    <th>Qualification</th>
                  </tr>
                </tfoot>
	<tbody>
<?php $i=1;
	while ($res=mysqli_fetch_assoc($query))
{ ?>
<tr> 
	<td><?php echo $i++; ?> </td>
	<td><?php echo  $res['first_name']; ?> </td>
	<td><?php echo $res['last_name']; ?> </td>
	<td><?php echo $res['email']; ?> </td>
    <td><?php echo $res['MobileNo'];?></td>
    <td><?php echo $res['DateOfBirth']; ?> </td>
    <td><?php echo $res['Qualification']; ?> </td>

</tr>
<?php } ?>    
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');
}
else{
		echo "Please <a href='index.php'>Login</a> to Access This Page";
	}
?>