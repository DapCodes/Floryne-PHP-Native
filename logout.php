<?php
require_once "1systems.php";
$cart = new Cart;
$cart -> deleteAll();
session_start();
session_unset();
session_destroy();

header("location: welcome.php");
?>