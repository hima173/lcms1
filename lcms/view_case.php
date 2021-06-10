<?php
require_once('header.php'); 
if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){	

require_once('config.php');
$sessionid=$_SESSION['user_id'];
$select="SELECT * FROM `decipher_lawyer_user_applied_case` where user_id=$sessionid";
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

</style>
<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
                <div class="col-md-12 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		  <br><br><br>
			<!-- <div class="col-md-12" > -->
		
				<table id="example" class="table table-striped table-bordered table-dark" style="width:100%">
					<thead style="color:#eac15a;">
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Type</th>
							<th>Topic</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>Delete</th>
							<th>Edit</th>
							
						</tr>
					</thead>
					<tbody class="text-light">
						<?php $i=1;
									while ($res=mysqli_fetch_assoc($query))
									{ ?>
									<tr> 
										<td><?php echo $i++; ?> </td>
										<td><?php echo $res['name']; ?> </td>
										<td><?php echo $res['type']; ?> </td>
										<td><?php echo $res['topic']; ?> </td>
										<td><?php echo $res['Date']; ?> </td>
										<td><?php echo $res['description']; ?> </td>
										<td style="color:green;"><?php echo $res['status']; ?></td>
										<?php $status=$res['status']; 
											if($status=="Approved" && "Rejected"){?>
												 <td><a href="#" class="btn disabled btn-danger text-white" role="button" aria-disabled="true">Delete</a></td>
												 <td><a href="#" class="btn disabled btn-success text-white" role="button" aria-disabled="true">Edit</td>
											<?php }
											 else {?>
										<td onclick="return fn()"><a href="delete_case.php?user_id=<?php echo $res['id'];?>" class="btn btn-danger text-white">Delete</a></td>
										<td><a href="javascript:;" class="edit_case btn btn-success text-white" case_id="<?php echo $res['id']; ?>" data-toggle="modal" data-target="#editModal">Edit</a></td>
											 </tr><?php } ?>  
									<?php } ?>  
                                    
					</tbody>
					<tfoot  style="color:#eac15a;">
						<tr>
							<th>S No.</th>
							<th>Name</th>
							<th>Type</th>
							<th>Topic</th>
							<th>Date</th>
							<th>Description</th>
							<th>Status</th>
							<th>delete</th>
							<th>Edit</th>
							
						</tr>
					</tfoot>
				</table>
				</div>
			
            <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Register Your Case</a></p> -->
          </div>
        </div>
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:#EAC15A;">Edit Case</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
		
				
        <form class="form p-3 bg-light" action="update_case.php" method="post">
		<div class="form-group">
			<label class="text-dark">Name:</label>
			<input type="text" placeholder="Enter Name" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
			<label class="text-dark">Type</label>
			<input type="text" placeholder="Enter Topic" class="form-control" id="type" name="type">
		</div>
		<div class="form-group">
			<label class="text-dark">Topic:</label>
			<input type="text" placeholder="Enter Type" class="form-control" id="topic" name="topic">
		</div>
		<div class="form-group">
			<label class="text-dark">Date:</label>
			<input type="text" placeholder="Enter Date" class="form-control" id="Date" name="date">
		</div>
		<div class="form-group">
    <label for="exampleFormControlTextarea1" class="text-dark">Description</label>
    <textarea class="form-control" placeholder="Enter Description" id="description" rows="4" name="description"></textarea>
  </div>
		
			<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Update">
      
			<input type="hidden" name="user_id" id="user_id">
		</div>
	</form>
			</div>
		  </div>
		</div>
		<script src="js/jquery.js"> </script>
        <script>
 $(document).ready( function () {
                
				$('.edit_case').click(function(){
					var case_id=$(this).attr('case_id');
					//alert(pro_id);
					$.ajax({
						url:'update_casejson.php',
						data:{case_id:case_id},
						dataType:'json',
						method:'post',
						success:function(response){
						console.log(response);
							$('#name').val(response.name);
							$('#type').val(response.type);
							$('#topic').val(response.type);
							$('#Date').val(response.Date);
							$('#description').val(response.description); 
							$('#user_id').val(response.id);
					
						}
					})
				})
            });
	
</script>
</div>
	<!-- /.container-fluid -->
<script> 
	function fn() {
		
		var x=confirm('Are you sure to delete?');
		return x;
	}
</script>		
</div>
<?php require_once('footer.php');
}else{
	header('Location:login_alert.php');
	}?>