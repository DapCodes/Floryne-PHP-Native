<?php
require_once "1systems.php";

$cart = new Cart;

$cart -> delete($_GET['id']);

header("location: cart.php");