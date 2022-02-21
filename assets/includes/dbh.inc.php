<?php 

// $conn = mysqli_connect("localhost", "id18114533_palutoo_uname", "Jimwel123!!!", "id18114533_palutoo_name");
$conn = mysqli_connect("localhost", "root", "", "paluto");

if (!$conn) {
	die("connection failed: " . mysqli_connect_errno());
	die("connection failed: " . mysqli_connect_error());
}

include "functions.inc.php";