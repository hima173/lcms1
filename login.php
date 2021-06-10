<?php require_once('header.php');
?>

<style>
.error{
	color:red;
	font-size:15px;
}
</style>

<body style="background-image: url('images/1.jpg');">
<br>
<br>

  <div class="container" >
  <div class="row justify-content-end">
  <div class="col-md-5">
    <div class="card card-login mx-auto mt-5">
	
      <div class="card-header text-white" style="background:#eac15a; ">Login</div>
      <div class="card-body">
	  <?php 
if(isset($_GET['login_error']) && $_GET['login_error']==1){
		echo "<p class='error'>Invalid Email & Password!!!!</p>";
	}
?>
<form action="logincheck.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" style="color:#3c312e;">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" style="color:#3c312e;">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
          
        <div class="text-center">
          <a class="d-block small mt-3" href="signup.php">Register an Account</a>
          <a class="d-block small mt-3" data-toggle="modal" data-target="#modal-warning" href="#">Forgot Password?</a>
          <div class="modal fade" id="modal-warning">
<div class="modal-dialog">
  <div class="modal-content bg-warning">
    <div class="modal-header">
      <h4 class="modal-title">Recover Your Password</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    </div>
    <form class="" action="recover_password.php" method="post">
      <div class="modal-body">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
        <input type="text" name="new_pass" value="<?php echo rand(100000 , 999999); ?>" hidden>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
        <button type="submit" name="email_verification" class="btn btn-outline-dark">Save changes</button>
      </div>
    </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>

  

</body>
<br>
<br>
<?php require_once('footer.php');?>

