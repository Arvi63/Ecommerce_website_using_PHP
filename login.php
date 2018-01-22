<?php 

require_once 'header.php';
 require_once 'admin/class/user.class.php';
 $user = new User();

if(isset($_POST['login'])) {
	$err = [];
	if(isset($_POST['email']) && !empty($_POST['email'])){
		$user->set('email',$_POST['email']);
	}else{
		$err['email'] = 'Enter Email';
	}

	if(isset($_POST['password']) && !empty($_POST['password'])){
		$user->set('password',$_POST['password']);
	}else{
		$err['password'] = 'Enter Password';
	}

	if(count($err)==0){
		$msg = $user->clogin();
	}

}


 ?>
	<!-- //header --> 	
	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3>  
			<div class="login-body">
				<?php if(isset($msg)){ echo $msg ;} ?>
				<form action="" method="post">
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<?php if(isset($err['email'])){ echo $err['email'];} ?>
					<input type="password" name="password" class="lock" placeholder="Password" required="">
					<?php if(isset($err['password'])){ echo $err['password'];} ?>
					<input type="submit" value="Login" name='login'>
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6> Not a Member? <a href="signup.html">Sign Up Now »</a> </h6> 
			<div class="login-page-bottom social-icons">
				<h5>Recover your social account</h5>
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
				</ul> 
			</div>
		</div>
	</div>
	<!-- //login-page --> 
	<?php require_once 'footer.php'; ?>