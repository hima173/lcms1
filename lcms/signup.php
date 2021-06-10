<?php require_once('header.php');?>
<style>
.clr{
	background:#eac15a;
	color:white;
}
.ftclr{
	color:#3c312e;
}
</style>



<body style="background-image: url('images/1.jpg');">
<br>
<br>
<br>
  <div class="container">
  <div class="row justify-content-end">
  <div class="col-md-6">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header clr"><b>Register an Account</b></div>
      <div class="card-body">
        <form action="signup_insert.php" method="post">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
               
				<label for="exampleInputEmail1" class="ftclr">First Name</label>
                  <input type="text" id="firstName" class="form-control" placeholder="First name" required autofocus="autofocus" name="first_name">
                  
              
              </div><br>
              <div class="col-md-6">
                
				<label for="lastName" class="ftclr">Last Name</label>
                  <input type="text" id="lastName" class="form-control" placeholder="Last name" required name="last_name">

    
                  
                
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail" class="ftclr">Email Address</label>
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
              
            
          </div>
          <div class="form-group">
        
            <label for="User Type" class="ftclr">User Type</label>
              
              <select name="User Type" id="User Type">
                <option value="User">User</option>
                <option value="Lawyer">Lawyer</option>
  
              </select>

            <div class="form-group">
            <label for="Gender" class="ftclr">Gender</label>
              
              <select name="Gender" id="Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>

        <div class="form-group">
            <label for="Address" class="ftclr">Address</label>
              <input type="Address" id="Address" class="form-control" placeholder="Enter address" required name="Address">
        </div>

        <div class="form-group">
            <label for="State" class="ftclr">State</label>
              <input type="State" id="State" class="form-control" placeholder="Enter State" required name="State">
        </div>

        <div class="form-group">
            <label for="City" class="ftclr">City</label>
              <input type="City" id="City" class="form-control" placeholder="Enter City" required name="City">
        </div>

        <div class="form-group">
            <label for="Occupation" class="ftclr">Occupation</label>
              <input type="Occupation" id="Occupation" class="form-control" placeholder="Enter your occupation" required name="Occupation">
        </div>

        <div class="form-group">
         
          <form action="/action_page.php">
          <label for="phone">Enter a phone number:</label><br><br>
           <input type="tel" id="phone" name="phone" placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required><br><br>
            <small>Format: 123-45-678</small>
            <input type="Submit">
          </form>
        </div>



  <div id="wrap">
   
   <select class="security" name="security1">
      <option value="0">Select a question from the following options.</option>
      <option value="1">What is your favorite food?</option>
      <option value="2">What is your favorite color?</option>
      <option value="3">What is your favorite place</option>
      
   </select>
   </p>
   <p>
   <select class="security" name="security2">
      <option value="0">Select a answer from the following options.</option>
      <option value="1">pizza</option>
      <option value="2">Black</option>
      <option value="3">Rajkot</option>
     
   </select>
   </p>
 
  </div>



              
            

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                 <label for="inputPassword" class="ftclr">Password</label>
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                 
                
              </div>

              </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                 <label for="inputPassword" class="ftclr">Confirm Password</label>
                  <input type="confirm password" id="inputPassword" class="form-control" placeholder=" confirm Password" required="required" name="confirm password">
                 
                
              </div>
             
             
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-2 " id="reg" name="register">Register</button>
        </form>
		<p class="mt-2 ftclr">Or</p>
        
          <a class="d-block small mb-2" href="login.php">Login Page</a>
        
      </div>
    </div>










  </div>
  </div>

</div>
<script src="js/jquery.js"> </script>
<script>
 $(document).ready( function () {
$('#reg').click(function(){
					var case_id=$('#reg').val();
					//alert(pro_id);
					$.ajax({
						url:'testalert.php',
						data:{case_id:case_id},
						dataType:'json',
						method:'post',
						success:function(response){
							if(response==="hey") {
						alert('Registered Successfully');
							};
						}
					})
				})
            });
	
</script>
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
<br>
<br>
<?php require_once('footer.php');?>


