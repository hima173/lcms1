<?php 
session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
	require_once('header.php'); 
	require_once('config.php');
	$select="SELECT * FROM `decipher_lawyer_feedback_lawyer`";
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
                            <li class="active">View Lawyer Feedback</li>
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
			Lawyer Feedback Table</div>
         <div class="card-body">
            <div class="table-responsive">
				<table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                   
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                  <th>S.NO.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                   
                  </tr>
                </tfoot>
	<tbody>
<?php $i=1;
	while ($res=mysqli_fetch_assoc($query))
{ ?>
<tr> 
	<td><?php echo $i++; ?> </td>
	<td><?php echo  $res['name']; ?> </td>
	<td><?php echo $res['email']; ?> </td>
    <td><?php echo $res['subject']; ?> </td>
    <td><?php echo $res['message']; ?> </td>
</tr>
<?php } ?>    
    </tbody>
</table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid --!>
<?php require_once('footer.php');
}
else{
		echo "Please <a href='index.php'>Login</a> to Access This Page";
	}
?>