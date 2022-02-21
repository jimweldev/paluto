<?php

$baseUrl = "../../";

include $baseUrl . "assets/includes/dbh.inc.php";

session_start();

if (isset($_POST["cook"])) {
	
	$id = $_SESSION["id"];

	foreach (selectPK("users", $id) as $row) {
		$currentBalance = $row["balance"];
	}

	$load = $_POST["load"];

	$newBalance = $currentBalance + $load;

	$sql = "UPDATE users SET balance = $newBalance WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "cook/buy-load?success");
	exit();

}

if (isset($_POST["rider"])) {
	
	$id = $_SESSION["id"];

	foreach (selectPK("users", $id) as $row) {
		$currentBalance = $row["balance"];
	}

	$load = $_POST["load"];

	$newBalance = $currentBalance + $load;

	$sql = "UPDATE users SET balance = $newBalance WHERE id = $id";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/buy-load?success");
	exit();

}