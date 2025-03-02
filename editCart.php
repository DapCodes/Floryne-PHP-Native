<?php
$min = $_GET['min'];
$plus = $_GET['plus'];

require "1systems.php";

$cart = new Cart;


if (isset($min)) {
    $show = $cart->show1($min);
    $fetch = mysqli_fetch_assoc($show);

    $qty = $fetch ['qty'] - 1;
    
    $result = mysqli_query($cart->koneksi, "UPDATE cart SET qty = '$qty' WHERE id = $min ");
    header("location: cart.php");
} elseif (isset($plus)) {
    $show = $cart->show1($plus);
    $fetch = mysqli_fetch_assoc($show);

    $qty = $fetch ['qty'] + 1;
    
    $result = mysqli_query($cart->koneksi, "UPDATE cart SET qty = '$qty' WHERE id = $plus ");
    header("location: cart.php");
}



?>