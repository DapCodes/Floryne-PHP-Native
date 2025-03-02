<?php
session_start();
if (! isset($_SESSION['login'])) {
	header("location: welcome.php");
} else {



require_once "1systems.php";

$history = new History;
$cart = new Cart;

$show = $cart -> showAll();
$total2 = 0;

foreach ($show as $a) {
	$sub = $a['price'] * $a['qty'];
	$total2 += $sub;
}


?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<title>Floryne || Checkout Payment</title>
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
						<li style="width: fit-content;"><a class="nav-link d-flex" style="gap: 10px;" href="cart.php"><img src="images/cart.svg"><?="IDR. " . $total2 ?></a></li>
						<li style="width:100px; position:relative; left: 40px; bottom:5px;"><a class="nav-link btn btn-outline-dark" href="logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		

	<form action="" method="post">
		<div class="untree_co-section">
		    <div class="container">
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_fname" name="fname" required>
		              </div>
		              <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_lname" name="lname" required>
		              </div>
		            </div>

		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_address" name="street" placeholder="Street address" required>
		              </div>
		            </div>

		            <div class="form-group mt-3">
		              <input type="text" class="form-control" name="address" placeholder="Apartment, suite, unit etc. (optional)" required>
		            </div>

		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="c_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_email_address" name="email" required>
		              </div>
		              <div class="col-md-6">
		                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="number" class="form-control" id="c_phone" name="phone" placeholder="Phone Number" required>
		              </div>
		            </div>

					
					
					
		            <div class="form-group">
		              <div class="collapse" id="ship_different_address">
		                <div class="py-2">
							
		                  <div class="form-group">
		                    <label for="c_diff_country" class="text-black">Country <span class="text-danger">*</span></label>
		                    <select id="c_diff_country" class="form-control">
		                      <option value="1">Select a country</option>    
		                      <option value="2">bangladesh</option>    
		                      <option value="3">Algeria</option>    
		                      <option value="4">Afghanistan</option>    
		                      <option value="5">Ghana</option>    
		                      <option value="6">Albania</option>    
		                      <option value="7">Bahrain</option>    
		                      <option value="8">Colombia</option>    
		                      <option value="9">Dominican Republic</option>    
		                    </select>
						</div>


		                  <div class="form-group row">
							  <div class="col-md-6">
		                      <label for="c_diff_fname" class="text-black">First Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
		                    </div>
						</div>

		                  <div class="form-group row">
		                    <div class="col-md-12">
		                      <label for="c_diff_companyname" class="text-black">Company Name </label>
		                      <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
		                    </div>
		                  </div>

		                  <div class="form-group row  mb-3">
		                    <div class="col-md-12">
		                      <label for="c_diff_address" class="text-black">Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Street address">
		                    </div>
		                  </div>
						  
		                  <div class="form-group">
		                    <input type="text" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
						</div>
						
						<div class="form-group row">
		                    <div class="col-md-6">
								<label for="c_diff_state_country" class="text-black">State / Country <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
		                    </div>
		                    <div class="col-md-6">
								<label for="c_diff_postal_zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
		                    </div>
						</div>

						<div class="form-group row mb-5">
		                    <div class="col-md-6">
		                      <label for="c_diff_email_address" class="text-black">Email Address <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
		                    </div>
		                    <div class="col-md-6">
		                      <label for="c_diff_phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
		                    </div>
		                  </div>
						  
		                </div>
						
		              </div>
		            </div>
					
		            <div class="form-group">
						<label for="c_order_notes" class="text-black">Order Notes</label>
						<textarea name="message" required id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
		            </div>

				</div>
			</div>
			<div class="col-md-6">
				
				<div class="row mb-5">
					<div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-4">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
							  <!-- pengulangan -->
							  <?php 
						
						$total = 0;
						$product = new Product;

						if (isset($_POST['order'])) {
							$user = new Users;
							$ambil = mysqli_fetch_assoc($user->show1($_SESSION['login']));
							$ts = $ambil['transaction'] + 1;
							$idUser = $ambil['id'];
							$updateUser = mysqli_query($conn, "UPDATE users SET transaction = $ts WHERE id = $idUser");
						}

				
						foreach ($cart->showAll() as $tampil) { 
							if (isset($_POST['order'])) {
								$name = $tampil['name'];
								$takeId = mysqli_query($conn, "SELECT * FROM product WHERE name = '$name'");

								
								
								$fetch = mysqli_fetch_assoc($takeId);
								$idProduct = $fetch['id'];

								$stock = $fetch['stock'] - $tampil['qty'];
								

								$updateStock = mysqli_query($conn, "UPDATE product SET stock = $stock WHERE id = $idProduct");
							}
							

							$sub = $tampil['price'] * $tampil['qty'];
							$total += $sub;

							?>
							<tr>
		                      <td><?= $tampil['name'] ?><strong class="mx-2">x</strong> <?= $tampil['qty'] ?></td>
		                      <td>IDR <?= $sub?></td>
		                    </tr>
							<?php } ?>
							

		                    <tr>
								<td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
		                      <td class="text-black"><strong>IDR <?= $total ?></strong></td>
		                    </tr>
		                    <tr>
								<td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong>IDR <?= $total ?></strong></td>
		                    </tr>
						</tbody>
					</table>
					
					<ul class="list-unstyled">
							<li class="">
								<p class="text-black d-block border-bottom" style="width:fit-content;"><strong>Payment Method</strong></p>
								<div style="display:flex;  gap:20px;">
									<input class="form-check-input" type="radio" name="metode" id="flexRadioDefault1" value="Credit Card">
									<label class="form-check-label text-black " style="font-size: 15px;" for="flexRadioDefault1"><i class="bi bi-credit-card"></i> Credit Card</label> <br>
									<input class="form-check-input mt-1" type="radio" name="metode" id="flexRadioDefault" value="Paypal">
									<label class="form-check-label text-black" style="font-size: 15px;" for="flexRadioDefault"><i class="bi bi-paypal"></i> Paypal</label>
								</div>
							</li>
							<li class="mt-3">
								<input type="password" class="form-control" id="c_diff_phone" name="card" placeholder="Card Number"  maxlength="16">
							</li>
						</ul>
							<a href="thankyou.php">
								<button type="submit" name="order" class="btn btn-black btn-lg py-3 btn-block">Place Order</button>
							</a>
		                </div>
		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      <!-- </form> -->
			</form>
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

$allQty = mysqli_query($conn, "SELECT qty FROM cart");
$allProduct = mysqli_query($conn, "SELECT name , qty FROM cart");
$data = "";

while ($a = mysqli_fetch_array($allProduct)) {
	$data .= $a['name'] . ' x' . $a['qty'] . '<br>';
}


if (isset($_POST['order'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$name = $fname . " " . $lname;

	$street = $_POST['street'];
	$address = $_POST['address'];
	$alamat = $street . ", " . $address;

	$email = $_POST['email'];
	$phoneNumber = $_POST['phone'];

	$message = $_POST['message'];

	$method = $_POST['metode'];
	$cardNumber = $_POST['card'];

	$history->Create($name, $alamat, $email, $phoneNumber, $data, $total, $message, $method, $cardNumber);

	echo "
            <script>
                document.location.href = 'thankyou.php';
            </script>
        ";
}



}
?>