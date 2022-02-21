<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["setPrice"])) {

	$id = $_POST["id"];
	$price = $_POST["price"];

	$sql = "UPDATE orders SET price = '$price', status = 2, status_description = 'dealing with price' WHERE id = $id";

	if (mysqli_query($conn, $sql)) {

		header("Location: " . $baseUrl . "cook/?success");
		exit();

	}

}