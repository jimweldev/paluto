<?php

$baseUrl = "../../../";

if (isset($_POST["searchMenu"])) {

	$query = $_POST["query"];
	
	header("Location: " . $baseUrl . "customer/search?q=" . $query);
	exit();

}

if (isset($_POST["searchCook"])) {

	$query = $_POST["query"];
	
	header("Location: " . $baseUrl . "customer/cooks?q=" . $query);
	exit();

}