<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_GET["earnings"])) {
	
	$data = array();

	$firstDate = date('Y-m-d', strtotime(date('Y-1-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-1')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-2-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-2')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-3-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-3')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-4-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-4')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-5-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-5')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-6-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-6')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-7-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-7')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-8-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-8')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-9-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-9')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-10-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-10')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-11-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-11')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	$firstDate = date('Y-m-d', strtotime(date('Y-12-1')));
	$lastDate = date("Y-m-t", strtotime(date('Y-12')));

	$sql = "SELECT sum(earning) as earning FROM earnings WHERE created_at BETWEEN '$firstDate' AND '$lastDate' GROUP BY MONTH(created_at)";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row['earning']);

		}

	} else {

		array_push($data, "0.00");	

	}

	echo json_encode($data);

}
