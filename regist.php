<?php
require "1systems.php";

session_start();
if (isset ($_SESSION['login'])) {
	header("location: index.php");
}

if (isset($_POST['reg'])) {
	$uname = $_POST['uname'];
	$password = $_POST['pws'];

	$users = new Users;
	$users -> regist($uname, $password);
	$_SESSION['login'] = $uname;
}



?>
<!doctype html>
<html lang="en">
  <head>
  	 <link rel="icon" href="favicon.png">
    <title>Floryne | Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/bootstrap.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container" style="height: 600px;">
		<img src="images/login-element.png" alt="" style="position: absolute; left:140px;">
		<img src="images/login-element5.png" alt="" style="position: absolute; left:250px; rotate:-10deg; bottom:0px;">
		<img src="images/login-element3.png" alt="" style="position: absolute; bottom:0px; right:200px; rotate:50deg;">
		<img src="images/login-element2.png" alt="" srcset="" style="position: absolute; width:300px; rotate:40deg; right: 250px; top:0px;">
		<img src="images/login-element4.png" alt="" style="position: absolute; width:370px; left:220px; bottom:100px; rotate:-15deg;">
			<div class="row justify-content-center" style="position: relative; bottom: 100px;">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(images/bg2.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="">Sign Up</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
									</p>
								</div>
			      		</div>
							<form action="#" class="signin-form" method="post">
			      		<div class="form-group mt-3">
			      			<input type="text" name="uname" class="form-control" required autocomplete="off">
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" name="pws" type="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="reg" class="form-control btn btn-primary rounded submit px-3">Sign Up</button>
					</div>
		          </form>
		          <p class="text-center">You are a member? <a data-toggle="tab" href="login.php">Sign In</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

