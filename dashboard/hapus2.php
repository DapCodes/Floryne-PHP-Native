<?php

require_once "../1systems.php";
$feedback = new Feedback;
$id = $_GET['id'];
$feedback -> delete($id);
header("location: feedback.php");


?>