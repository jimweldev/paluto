<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["requestSubmit"])) {

	session_start();

	$customersId = $_SESSION["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$pax = $_POST["pax"];
	$deliveryTime = $_POST["deliveryTime"];
	
	$sql = "INSERT INTO requests (customers_id, name, description, delivery_time, status, pax) VALUES ('$customersId', '$name', '$description', '$deliveryTime', 1, $pax)";

	if (mysqli_query($conn, $sql)) {
		
		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}

if (isset($_GET["cancelRequest"])) {
	
	$id = $_GET["id"];

	$sql = "DELETE FROM requests WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		
		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}

if (isset($_POST["requestMenuSubmit"])) {

	session_start();

	$menusId = $_POST["menusId"];
	$customersId = $_SESSION["id"];
	$cooksId = $_POST["cooksId"];
	$name = $_POST["name"];
	$description = $_POST["description"];
	$pax = $_POST["pax"];
	$deliveryTime = $_POST["deliveryTime"];
	
	$sql = "INSERT INTO cook_requests (menus_id, cooks_id, customers_id, name, description, delivery_time, status, pax) VALUES ($menusId, $cooksId, $customersId, '$name', '$description', '$deliveryTime', 1, $pax)";

	if (mysqli_query($conn, $sql)) {
		
		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}

if (isset($_GET["cancelMenuRequest"])) {
	
	$id = $_GET["id"];

	$sql = "DELETE FROM cook_requests WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		
		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}