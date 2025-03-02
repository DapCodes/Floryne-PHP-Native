<?php
require "1systems.php";


$id = $_GET['id'];

$product = new Product;
$rowProduct = $product->show1($id);
$fetch = mysqli_fetch_assoc($rowProduct);

$name = $fetch['name'];
$price = $fetch['price'];
$qty = 1;
$itemCode = $fetch['itemCode'];
$gambar = $fetch['gambar'];


$cart = new Cart;
$dataCart = $cart->showAll();
$cek = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$name'");
$f = mysqli_fetch_assoc($cek);

if (mysqli_num_rows($cek)) {
    $qty = $f['qty'] + 1;
    echo $qty;

    $query = mysqli_query($conn, " UPDATE cart SET 
                qty = '$qty'
              WHERE name = '$name';
    ");

    header("location: cart.php");

} else {
    
    $result = $cart->create($name, $price, $qty, $itemCode, $gambar);
    header("location: cart.php");

}