<?php
session_start();
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
    require_once('header.php');
	require_once('config.php');
	$select="SELECT * FROM `decipher_lawyer_user_applied_case`";
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
                            <li class="active">View Case</li>
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
			View Case Table</div>
         <div class="card-body">
            <div class="table table-responsive">
                            <table id="bootstrap-data-table-export"  class="table table-striped table-bordered " style="width:100%">
					<thead >
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Type</th>
							<th>Topic</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Final-Status</th>
							
							
						</tr>
					</thead>
					<tbody >
						<?php $i=1;
									while ($res=mysqli_fetch_assoc($query))
									{ ?>
									<tr> 
									<td><?php echo $i++;?></td>
									<td><?php echo $res['name'];?></td>
										<td><?php echo $res['type'];?></td>
										<td><?php echo $res['topic'];?></td>
										<td><?php echo $res['Date'];?></td>
										<td><?php echo $res['description'];?></td>
										<td style="color:green;"><?php echo $res['status'];?></td>
										<td style="color:green;"><?php echo $res['Final-Status'];?></td>
										
										
										</tr>
										<?php } ?>  
                                        
						
					</tbody>
					<tfoot>
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Type</th>
							<th>Topic</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Final-Status</th>
							
						</tr>
					</tfoot>
				</table>
				</div>
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
