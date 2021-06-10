<?php
//session_start();
require_once('header.php');
	if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){
     
	require_once('config.php');
	$select="SELECT * FROM `decipher_lawyer_user_applied_case` WHERE `status` NOT LIKE 'Approved'";
	$query=mysqli_query($conn,$select);
?>
<style>
.dataTables_length{
	text-align:left;
	color:#eac15a;
	
}
.dataTables_info{
	text-align:left;
	color:#eac15a;
}
.dataTables_filter{
	color:#eac15a;
}
.dataTables_length form-control{
	height:25px !important;
}

</style>

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                <div class="col-md-12 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		  
			<!-- <div class="col-md-12" > -->
		

				<table id="example" class="table table-striped table-bordered  table-dark" style="width:100%">
					<thead style="color:#eac15a;">
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Topic</th>
							<th>Type</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody class="text-white">
						<?php $i=1;
									while ($res=mysqli_fetch_assoc($query))
									{ ?>
									<tr> 
									<td><?php echo $i++;?></td>
									<td><?php echo $res['name'];?></td>
										<td><?php echo $res['topic'];?></td>
										<td><?php echo $res['type'];?></td>
										<td><?php echo $res['Date'];?></td>
										<td><?php echo $res['description'];?></td>
										<td style="color:green;"><?php echo $res['status'];?></td>
										
										<?php $status=$res['status']; 
											if($status=="Rejected"){?>
												 <td> Status Is Rejected !!! </td>
											<?php }
											 else {?>
												<td>
													<form action="mail.php" method="post">
													<input type="hidden" name="req_id" value="<?php echo $res['id'];?>">
													<button type="submit" name="Approved" class="btn btn-success rishabh" >Approve</button>
													<button type="submit" name="Rejected" class="btn btn-danger reject" >Reject</button>
													</form>
												</td>
											 </tr><?php } ?>
										<?php } ?>
					</tbody>
					<tfoot  style="color:#eac15a;">
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Topic</th>
							<th>Type</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Action</th>
							
						</tr>
					</tfoot>
				</table>
				</div>
            <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Register Your Case</a></p> -->
          </div>
        </div>
</div>

<script src="js/jquery.js"> </script>
<script>
 $(document).ready( function () {
                
				$('.rishabh').click(function(){
					var case_id=$('.rishabh').val();
					//alert(pro_id);
					$.ajax({
						url:'testalert.php',
						data:{case_id:case_id},
						dataType:'json',
						method:'post',
						success:function(response){
							if(response==="hey") {
						alert('Status approved');
							};
						}
					})
				})
				$('.reject').click(function(){
					var case_id=$('.reject').val();
					//alert(pro_id);
					$.ajax({
						url:'testalert.php',
						data:{case_id:case_id},
						dataType:'json',
						method:'post',
						success:function(response){
							if(response==="hey") {
						alert('Status rejected');
							};
						}
					})
				})
            });
	
</script>
<?php require_once('footer.php');
	}else{
		header('Location:login_alert.php');
	}?>