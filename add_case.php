<?php 
require_once('header.php'); 
if(isset($_SESSION['user_id']) && $_SESSION['user_id']!=""){	
$session_name=$_SESSION['user_name'];
?>

<div class="hero-wrap js-fullheight" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div><br>
      <div class="container mt-3">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          <div class="col-md-5  ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		  <div class="card card-login mx-auto">
	
      <div class="card-header text-white" style="background:#eac15a;">ADD CASE</div>
      <div class="card-body">
		<form class="form" action="insert_case.php" method="post">
		<div class="form-group">
			<label class="text-dark">Name:</label>
			<input type="text" class="form-control" name="name" readonly value="<?php echo $session_name; ?>">
		</div>
		<div class="form-group">
			<label class="text-dark">Type</label>
				<select name="type" id="Type">
  				<option value="Family Law">Family Law</option>
  				<option value="Business Law">Business Law</option>
  				<option value="Insurance Law">Insurance Law</option>
  				<option value="Criminal Law">Criminal Law</option>
				<option value="Property Law">Property Law</option>
				<option value="Employment Law">Employment Law</option>
				<option value="Fire Accident">Fire Accident</option>
				<option value="Financial Law">Financial Law</option>
				<option value="Drug Offenses">Drug Offenses</option>
				<option value="Sexual Offenses">Sexual Offenses</option>
				</select>

		</div>
		<div class="form-group">
			<label class="text-dark">Topic</label>
			<input type="Topic" class="form-control" id="Topic" placeholder="Topic" name="topic">
  </div>
  

		

		<div class="form-group">
			
			
			<label for="start">Date:</label>

			<input type="date" id="date" name="date"
      		 value="2000-01-01"
       		min="2000-01-01" max="2021-12-31">

		</div>

		<div class="form-group">
    <label for="exampleFormControlTextarea1" class="text-dark">Description</label>
    <textarea class="form-control" placeholder="Enter Description" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
  </div>
		<div>
			<button type="submit" class="btn btn-primary">Request</button>
		</div>
	</form>
	
	</div>
	</div>
	</div>
			
            <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Register Your Case</a></p> -->
          </div>
        </div>
      </div>
    




	
<?php require_once('footer.php');
}else{
	echo "Please <a href='login.php'>Login</a> to Access This Page";
	}?>