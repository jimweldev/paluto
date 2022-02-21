<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["dealPrice"])) {
	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 3, status_description = 'looking for a rider' WHERE id = $id";

	if (mysqli_query($conn, $sql)) {

		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}
}

if (isset($_POST["updateDate"])) {

	$ordersId = $_POST["ordersId"];

	$deliveryTime = $_POST["deliveryTime"];

	$sql = "UPDATE orders SET delivery_time = '$deliveryTime' WHERE id = $ordersId";

	if (mysqli_query($conn, $sql)) {

		// SELECT ORDER 
		$sql = "SELECT * FROM orders WHERE id = $ordersId";
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)) {

			$orderName = $row["name"];
			$cooksId = $row["cooks_id"];
			$ridersId = $row["riders_id"];

		}

		$description = "The customer updated the time.";

		$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($cooksId, $ordersId, 'Cancelled Order', '$description')";
		mysqli_query($conn, $sql);

		$description = "The customer updated the time.";

		$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($ridersId, $ordersId, 'Cancelled Order', '$description')";
		mysqli_query($conn, $sql);


		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}

if (isset($_GET["cancelOrder"])) {
	$ordersId = $_GET["id"];

	// SELECT ORDER 
	$sql = "SELECT * FROM orders WHERE id = $ordersId";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		$orderName = $row["name"];
		$cooksId = $row["cooks_id"];
		$ridersId = $row["riders_id"];

	}

	// NOTIFY COOK AND RIDER

	$description = "The customer's order " . $orderName . " has been cancelled.";

	$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($cooksId, $ordersId, 'Cancelled Order', '$description')";
	mysqli_query($conn, $sql);

	$description = "Your delivery " . $orderName . " has been cancelled.";

	$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($ridersId, $ordersId, 'Cancelled Order', '$description')";
	mysqli_query($conn, $sql);

	$sql = "DELETE FROM orders WHERE id = $ordersId";

	if (mysqli_query($conn, $sql)) {

		header("Location: " . $baseUrl . "customer/orders?success");
		exit();

	}

}

if (isset($_GET["getCoordinate"])) {
	
	$id = $_GET["id"];

	$sql = "SELECT * FROM orders WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			echo $row["coordinate"];

		}

	}
	
}

