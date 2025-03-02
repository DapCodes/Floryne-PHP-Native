<?php
require_once "1systems.php";

$cart = new Cart;

$count = $cart->count();
$fetch = mysqli_fetch_assoc($count);

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
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<title>Floryne || Cart</title>
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
		

		<div class="section before-footer-section">
		<?php if ($fetch['total'] > 0) { ?>
			 <div class="container">
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
						
						$total = 0;
						$sub = 0;
						foreach ($cart->showAll() as $tampil) { 
							$sub = $tampil['price'] * $tampil['qty'];

							$total += $sub;
							?>
						
							<tr id="product">
								<td class="product-thumbnail">
									<img src="asset/<?= $tampil['gambar'] ?>" alt="Image" class="img-fluid">
								</td>
								<td class="product-name">
									<h2 class="h5 text-black"><?= $tampil['name'] ?></h2>
								</td>
								<td>IDR <?= $tampil['price'] ?></td>
								<td>
									<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px; position:relative; left:12px;">
									<div class="input-group-prepend">
										<a href="editCart.php?min=<?= $tampil['id'] ?>">
											<button name="minus" class="btn btn-outline-black decrease" type="button">&minus;</button>
										</a>
									</div>
									<input type="text" name="qty" style="border-radius: 10px;" class="form-control bg-white text-center quantity-amount" value="<?= $tampil['qty'] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" disabled readonly>
									<div class="input-group-append">
										<a href="editCart.php?plus=<?= $tampil['id'] ?>">
											<button name="plus" class="btn btn-outline-black increase" type="button">&plus;</button>
										</a>
									</div>
									</div>
				
								</td>
								<td>IDR <?= $sub ?></td>
								<td><a href="hapusCart.php?id=<?= $tampil['id'] ?>" class="btn btn-black btn-sm">X</a></td>
							</tr>
						<?php } ?>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6">
						<a href="shop.php">
                    	  <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
						</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">IDR <?= $total ?></strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">IDR <?= $total ?></strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
		<?php } else { ?>
			<div class="untree_co-section" style="position: relative; bottom:90px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
					<span class="display-3 thankyou-icon text-primary">
						<i class="bi bi-cart-x"></i>
						<path fill-rule="evenodd" d="M11.354 5.646a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708 0z"/>
						<path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
						</svg>
					</span>
					<h2 class="display-3 text-black mt-5">Your cart is empty</h2>
					<p class="lead mb-5">Add some stuff first. thankyou!</p>
					<p><a href="shop.php" class="btn btn-sm btn-outline-black">Back to shop</a></p>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
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