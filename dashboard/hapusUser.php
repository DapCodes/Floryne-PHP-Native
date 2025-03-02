<?php
$id = $_GET['id'];

require "../1systems.php";
$user = new Users;

$user->delete($id);
header("location: customer.php");
?>