<?php
session_start();
if (! isset($_SESSION['login'])) {
	header("location: welcome.php");
} else {



require_once "1systems.php";

$cart = new Cart;
$show = $cart -> showAll();
$total = 0;

foreach ($show as $a) {
	$sub = $a['price'] * $a['qty'];
	$total += $sub;
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>Floryne || Shop</title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar" style="height: 80px;">

			<div class="container">
				<a class="navbar-brand" href="index.php">Floryne</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li><a class="nav-link" href="index.php#product">Shop</a></li>
						<li class=""><a class="nav-link" href="index.php#about">About us</a></li>
						<li><a class="nav-link" href="index.php#service">Services</a></li>
						<li><a class="nav-link" href="index.php#blog">Blog</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5" style="margin-top: 10px;">
						<li style="width: fit-content;"><a class="nav-link d-flex" style="gap: 10px;" href="cart.php"><img src="images/cart.svg"><?="IDR. " . $total ?></a></li>
						<li style="width:100px; position:relative; left: 40px; bottom:5px;"><a class="nav-link btn btn-outline-dark" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
		

		<div class="untree_co-section product-section before-footer-section" id="p">
		    <div class="container">
		      	<div class="row">

				
				<?php 
				$product = new Product;
				foreach ($product->showAll() as $x) { ?>

					<div class="col-12 col-md-4 col-lg-3 mb-5">
						<a class="product-item" href="addCart.php?id=<?= $x['id'] ?>">
							<img src="asset/<?= $x['gambar'] ?>" class="img-fluid product-thumbnail">
							<h3 class="product-title"><?= $x['name'] ?></h3>
							<strong class="product-price">IDR <?= $x['price'] ?></strong>

							<span class="icon-cross">
								<img src="images/cross.svg" class="img-fluid">
							</span>
						</a>
					</div> 

			<?php	} ?>
				
					
		      	</div>
		    </div>
		</div>


		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/f9.png" alt="Image" class="img-fluid">
				</div>
							
				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Floryne</a></div>
						<p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat, consequuntur. Neque ratione magni sapiente sunt ipsam debitis doloribus sit accusantium!</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="about.php">About us</a></li>
									<li><a href="services.php">Services</a></li>
									<li><a href="contact.php">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="contact.php">Support</a></li>
									<li><a href="shop.php">Knowledge base</a></li>
									<li><a href="services.php">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy; Daffa Ramadhan  All Rights Reserved. &mdash; Create with love by <a href="">d4pfft.</a></p>
						</div>
					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
<?php
}?>