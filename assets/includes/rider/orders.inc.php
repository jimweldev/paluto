<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["getDelivery"])) {

	session_start();

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 4, status_description = 'rider found' , riders_id = {$_SESSION['id']} WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/?success");
	exit();

}

if (isset($_GET["receivedOrder"])) {

	session_start();

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 8, status_description = 'rider received the order' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/?success");
	exit();

}

if (isset($_GET["orderOnDelivery"])) {

	session_start();

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 9, status_description = 'on the way' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/?success");
	exit();

}

if (isset($_GET["doneDelivery"])) {

	session_start();

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 10, status_description = 'done delivery' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/?success");
	exit();

}

if (isset($_GET["setCoordinate"])) {

	$id = $_GET["id"];
	$coordinate = $_GET["setCoordinate"];

	$sql = "UPDATE orders SET coordinate = '$coordinate' WHERE id = $id";
	mysqli_query($conn, $sql);

}

if (isset($_GET["payCommission"])) {

	session_start();

	$id = $_SESSION["id"];
	$ordersId = $_GET["id"];

	foreach (selectPK("users", $id) as $row) {
		
		$balance = $row["balance"];

	}

	foreach (selectPK("orders", $ordersId) as $row) {
		
		$commission = $row["delivery"];

	}

	$toPay = (10 / 100) * $commission;

	if ($balance >= $toPay) {
	    $date = date('Y-m-d');
	    
		$newBalance = $balance - $toPay;

		$sql = "UPDATE users SET balance = $newBalance WHERE id = $id";
		mysqli_query($conn, $sql);

		$sql = "UPDATE orders SET rider_commission = 1 WHERE id = $ordersId";
		mysqli_query($conn, $sql);

		$date = date("Y-m-d");

		$sql = "INSERT INTO earnings (earning, created_at) VALUES ($toPay, '$date')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO payments (orders_id, users_id, commission, price, created_at) VALUES ($ordersId, $id, $toPay, 0, '$date')";

		header("Location: " . $baseUrl . "rider/delivery-history?success");
		exit();
	} else {
		header("Location: " . $baseUrl . "rider/delivery-history?error=Insufficient balance");
		exit();
	}

}