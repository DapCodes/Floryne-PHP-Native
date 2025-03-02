<?php
require "1systems.php";
session_start();

if (isset($_SESSION['login'])) {
	header("location: index.php");
}

$user = new Users;

if (isset($_POST['log'])) {
	$username = $_POST['uname'];
	$password = $_POST['password'];

	$admin = $user->admin(1);
	$fetch1 = mysqli_fetch_assoc($admin);

	

	$fetch = mysqli_fetch_assoc($user->show1($username));
	if (password_verify($password, $fetch['password'])) {
		$_SESSION['login'] = $username;
		echo "
            <script>
                alert('Login sebagai $username');
                document.location.href = 'index.php';
            </script>
        <?php";
	} elseif ($username === $fetch1['username'] && $password === $fetch1['password']){
		$_SESSION['admin'] = $username;
		echo "
            <script>
                alert('Login sebagai admin');
                document.location.href = 'dashboard/dashboard.php';
            </script>
        ";
	} else {
		header("location: login.php");
	}

} 


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="icon" href="favicon.png">
    <title>Floryne | Sign In</title>

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
			      			<h3 class="">Sign In</h3>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-instagram"></span></a>
									</p>
								</div>
			      		</div>
							<form action="#" class="signin-form" method="post">
			      		<div class="form-group mt-3">
			      			<input type="text" class="form-control" name="uname" required autocomplete="off">
			      			<label class="form-control-placeholder" for="username">Username</label>
			      		</div>
		            <div class="form-group">
		              <input id="password-field" type="password" name="password" class="form-control" required>
		              <label class="form-control-placeholder" for="password">Password</label>
		            </div>
		            <div class="form-group">
		            	<button type="submit" name="log" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
					</div>
		          </form>
		          <p class="text-center">Not a member? <a data-toggle="tab" href="regist.php">Sign Up</a></p>
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

