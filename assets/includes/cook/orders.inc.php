<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["preparingIngredients"])) {

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 5, status_description = 'preparing for ingredients' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "cook/?success");
	exit();

}

if (isset($_GET["startedCookiing"])) {

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 6, status_description = 'cooking' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "cook/?success");
	exit();

}

if (isset($_GET["doneCookiing"])) {

	$id = $_GET["id"];

	$sql = "UPDATE orders SET status = 7, status_description = 'done cooking' WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "cook/?success");
	exit();

}

if (isset($_GET["payCommission"])) {

	session_start();

	$id = $_SESSION["id"];
	$ordersId = $_GET["id"];

	foreach (selectPK("users", $id) as $row) {
		
		$balance = $row["balance"];

	}

	foreach (selectPK("orders", $ordersId) as $row) {
		
		$commission = $row["price"];

	}

	$toPay = (10 / 100) * $commission;

	if ($balance >= $toPay) {
	    $date = date('Y-m-d');
	    
		$newBalance = $balance - $toPay;

		$sql = "UPDATE users SET balance = $newBalance WHERE id = $id";
		mysqli_query($conn, $sql);

		$sql = "UPDATE orders SET cook_commission = 1 WHERE id = $ordersId";
		mysqli_query($conn, $sql);

		$date = date("Y-m-d");

		$sql = "INSERT INTO earnings (earning, created_at) VALUES ($toPay, '$date')";
		mysqli_query($conn, $sql);

		$sql = "INSERT INTO payments (orders_id, users_id, commission, price, created_at) VALUES ($ordersId, $id, $toPay, 0, '$date')";
		mysqli_query($conn, $sql);

		header("Location: " . $baseUrl . "cook/order-history?success");
		exit();
	} else {
		header("Location: " . $baseUrl . "cook/order-history?error=Insufficient balance");
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
		$customersId = $row["customers_id"];
		$ridersId = $row["riders_id"];

	}

	// NOTIFY COOK AND RIDER

	$description = "Your order " . $orderName . " has been cancelled.";

	$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($customersId, $ordersId, 'Cancelled Order', '$description')";
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

if (isset($_POST["estimatedTimeSubmit"])) {

	$ordersId = $_POST["ordersId"];

	$estimatedTime = $_POST["estimatedTime"];

	$sql = "UPDATE orders SET estimated_time = '$estimatedTime' WHERE id = $ordersId";

	if (mysqli_query($conn, $sql)) {

		// SELECT ORDER 
		$sql = "SELECT * FROM orders WHERE id = $ordersId";
		$result = mysqli_query($conn, $sql);

		while ($row = mysqli_fetch_assoc($result)) {

			$orderName = $row["name"];
			$customersId = $row["customers_id"];
			$ridersId = $row["riders_id"];

		}

		$description = "The cook set an estimated time for food to be done.";

		$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($customersId, $ordersId, 'Cancelled Order', '$description')";
		mysqli_query($conn, $sql);

		$description = "The cook set an estimated time for food to be done.";

		$sql = "INSERT INTO notifications (users_id, orders_id, title, description) VALUES ($ridersId, $ordersId, 'Cancelled Order', '$description')";
		mysqli_query($conn, $sql);


		header("Location: " . $baseUrl . "cook/?success");
		exit();

	}

}