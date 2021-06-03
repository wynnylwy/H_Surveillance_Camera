<?php 
require_once 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<?php 
		require_once 'header_index.php'; 
	?>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<br><br><br><br><br>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="insertRegister.php" method="POST">
					<span class="login100-form-title">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid user ID is required">
						<input class="input100" type="text" id="userID" name="userID" placeholder="User ID">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Valid username is required">
						<input class="input100" type="text" id="name" name="name" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required">
						<input class="input100" type="text" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" id="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
						<input class="input100" type="password" id="Cpassword" name="Cpassword" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="input10">
					<fieldset>
					<label for="position" class="txt2" style = "text-align:left;font-size:15px;">Position:</label> 
						<span class="col-sm-10">
							<span class="form-check">
								<input class="form-check-input" type="radio" name="position" id="position1" value="manager" required>
								<label class="form-check-label" for="position1" style = "font-style:italic;">Manager</label>
							</span>
							<span class="form-check">
								<input class="form-check-input" type="radio" name="position" id="position2" value="staff" required>
								<label class="form-check-label" for="position2" style = "font-style:italic;">Staff</label>	
							</span>
						
					</fieldset>
						
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Register
						</button>
					</div>

					<div class="container-login100-form-btn">
						<button type="reset" class="login100-form-btn">
							Reset
						</button>
					</div>

					<div class="text-center p-t-12">
						<a class="txt2" href="index.php">
							Have account already ?
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>