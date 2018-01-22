<?php
 
 require_once 'admin/class/user.class.php';
 $user = new User();

 if(isset($_POST['submit'])) {
 	$err = [];
 	 if(isset($_POST['name']) && !empty($_POST['name'])) {
 	 	$user->set('name',$_POST['name']);
 	 } else {
 	 	$err['name'] = 'Enter your name';
 	 }

 	  if(isset($_POST['email']) && !empty($_POST['email'])) {
 	 	$user->set('email',$_POST['email']);
 	 } else {
 	 	$err['email'] = 'Enter your email';
 	 }

 	  if(isset($_POST['password']) && !empty($_POST['password'])) {
 	 	$user->set('password',$_POST['password']);
 	 } else {
 	 	$err['password'] = 'Enter your password';
 	 }

 	 if(count($err)==0){
 	 	$msg = $user->create();
 	 }
 }
require_once 'header.php';

 ?>
	<!-- sign up-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<?php if(isset($msg)){ echo $msg;} ?>
				<form action="" method="post">
					<input type="text" class="user" name="name" placeholder="Enter your Name" required=""> <?php if(isset($err['name'])){ echo $err['name'];} ?>
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<?php if(isset($err['email'])){ echo $err['email'];} ?>
					<input type="password" name="password" class="lock" placeholder="Password" required="">
					<?php if(isset($err['password'])){ echo $err['password'];} ?>
					<input type="submit" value="Sign Up " name='submit'>
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6>Already have an account? <a href="login.html">Login Now »</a> </h6>  
		</div>
	</div>
	<!-- //sign up-page --> 
<?php require_once 'footer.php'; ?>