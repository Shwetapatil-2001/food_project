<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=md5($_POST['password']);

$query=mysqli_query($con,"insert into customer(username,password) values('$username','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	header('location:user-login.php');
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>User Registration</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		<script type="text/javascript">
function valid()
{
 if(document.registration.password.value!= document.registration.password_again.value)
{
alert("Password and Confirm Password Failed do not match  !!");
document.registration.password_again.focus();
return false;
}
return true;
}

</script>
		

	</head>
	<body class="login">
		<!-- start: REGISTRATION -->
		<div class="row">
			<div class="main-login pat_login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.html"><h2>User Registration</h2></a>
				</div>
				<!-- start: REGISTER BOX -->
				<div class="box-register ">
					<form name="registration" id="registration"  method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
								Sign Up
							</legend>
							<p>
								Enter your details below:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="username" placeholder="Username" required>
							</div>
							
							<!-- <div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control" id="password"    name="password" placeholder="Password" required>
									<i class="fa fa-lock"></i> </span>
							</div> -->

							<div class="form-group">
    <span class="input-icon">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        <i class="fa fa-lock"></i>
    </span>
    <small id="passwordHelp" class="form-text text-muted">Password must be at least 8 characters long, contain an uppercase letter, a number, and a special character.</small>
    <div id="passwordError" style="color:red; display:none;">Password does not meet the criteria</div>
</div>

							<div class="form-group">
								<span class="input-icon">
									<input type="password" class="form-control"  id="password_again"  name="password_again" placeholder="Password Again" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
									<label for="agree">
										I agree
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Already have an account?
									<a href="user-login.php">
									Log-in
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

					<!--<div class="copyright">
						&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> HMS</span>. <span>All rights reserved</span>
					</div>-->

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
				jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
		<script>
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const errorMessage = document.getElementById('passwordError');

        // Regular expression to check password strength
        const passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordPattern.test(password)) {
            errorMessage.style.display = 'block';
        } else {
            errorMessage.style.display = 'none';
        }
    });
</script>	
	</body>
	<!-- end: BODY -->
</html>