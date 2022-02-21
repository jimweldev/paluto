<?php

date_default_timezone_set("Asia/Manila");

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["sendMessage"])) {
	
	$id = $_POST["id"];
	$userType = "Rider";
	$message = mysqli_real_escape_string($conn, $_POST["message"]);
	$date = date('Y-m-d H:i:s');

	$sql = "INSERT INTO messages (orders_id, user_type, message, created_at) VALUES ($id, '$userType', '$message', '$date')";
	mysqli_query($conn, $sql);

	header("Location: " . $baseUrl . "rider/messages?id=" . $id);
	exit();

}