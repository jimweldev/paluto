<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["getRequest"])) {

	session_start();
	
	$id = $_GET["id"];

	$sql = "UPDATE requests SET status = 2 WHERE id = $id";

	if (mysqli_query($conn, $sql)) {

		$cooksId = $_SESSION["id"];
		
		foreach (selectPK("requests", $id) as $row) {

			$customersId = $row["customers_id"];
			$name = $row["name"];
			$description = $row["description"];
			$deliveryTime = $row["delivery_time"];
			$pax = $row["pax"];

		}

		foreach (selectPK("users", $cooksId) as $row) {
            $cooksBarangayId = $row["barangays_id"];
        }

        foreach (selectPK("users", $customersId) as $row) {
            $customersBarangayId = $row["barangays_id"];
        }

        $sql = "SELECT * FROM fare_matrix WHERE (place1_id = $cooksBarangayId AND place2_id = $customersBarangayId) OR (place1_id = $customersBarangayId AND place2_id = $cooksBarangayId)";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				$delivery = $row["price"];

			}

		} else {

			$delivery = 49;

		}

		$sql = "INSERT INTO orders (cooks_id, customers_id, name, description, delivery_time, delivery, status, riders_id, coordinate, cook_commission, rider_commission, status_description, price, pax) VALUES ('$cooksId', '$customersId', '$name', '$description', '$deliveryTime', $delivery, 1, 0, '120.59634588976796, 15.155984767578119', 0, 0, 'request accepted', 0.00, $pax)";

		if (mysqli_query($conn, $sql)) {
		
			header("Location: " . $baseUrl . "cook/?success");
			exit();

		}

	}

}

if (isset($_GET["getCookRequest"])) {

	session_start();
	
	$id = $_GET["id"];

	$sql = "UPDATE cook_requests SET status = 2 WHERE id = $id";

	if (mysqli_query($conn, $sql)) {

		$cooksId = $_SESSION["id"];
		
		foreach (selectPK("cook_requests", $id) as $row) {

			$customersId = $row["customers_id"];
			$name = $row["name"];
			$description = $row["description"];
			$deliveryTime = $row["delivery_time"];
			$pax = $row["pax"];

		}

		foreach (selectPK("users", $cooksId) as $row) {
            $cooksBarangayId = $row["barangays_id"];
        }

        foreach (selectPK("users", $customersId) as $row) {
            $customersBarangayId = $row["barangays_id"];
        }

        $sql = "SELECT * FROM fare_matrix WHERE (place1_id = $cooksBarangayId AND place2_id = $customersBarangayId) OR (place1_id = $customersBarangayId AND place2_id = $cooksBarangayId)";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				$delivery = $row["price"];

			}

		} else {

			$delivery = 49;

		}

		$sql = "INSERT INTO orders (cooks_id, customers_id, riders_id, name, description, price, delivery_time, delivery, status, cook_commission, rider_commission, status_description, coordinate, pax) VALUES ('$cooksId', '$customersId', 0, '$name', '$description', 0.00, '$deliveryTime', $delivery, 1, 0, 0, 'request accepted', '120.59634588976796, 15.155984767578119', $pax)";

		if (mysqli_query($conn, $sql)) {
		
			header("Location: " . $baseUrl . "cook/?success");
			exit();

		}

	}

}

if (isset($_GET["declineCookRequest"])) {

	session_start();
	
	$id = $_GET["id"];

	$sql = "UPDATE cook_requests SET status = 0 WHERE id = $id";

	if (mysqli_query($conn, $sql)) {
		
		header("Location: " . $baseUrl . "cook/requests-page?success");
		exit();

	}

}