<?php

$baseUrl = "../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["messages"])) {
	
	$id = $_GET["id"];

	echo count(selectFK("messages", "orders_id", $_GET["id"], "ASC"));

}

if (isset($_GET["requests-page"])) {

	echo count(selectCookRequests("DESC"));

}

if (isset($_GET["requests-cook-page"])) {

	$id = $_GET["id"];

	echo count(selectCookCustomerRequests($id, "DESC"));

}

if (isset($_GET["rider-orders"])) {

	echo count(selectRiderOrders("DESC"));

}


