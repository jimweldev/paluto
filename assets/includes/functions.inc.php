<?php 

// SELECTS
function select($table, $order) {

	global $conn;

	$sql = "SELECT * FROM $table ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectPK($table, $id) {

	global $conn;

	$sql = "SELECT * FROM $table WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectFK($table, $column, $id, $order) {

	global $conn;

	$sql = "SELECT * FROM $table WHERE $column = $id ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectColumn($table, $column, $value, $order) {

	global $conn;

	$sql = "SELECT * FROM $table WHERE $column = $value ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}
// SELECTS

// CUSTOMERS
function selectCustomerRequests($id, $order) {

	global $conn;

	$sql = "SELECT * FROM requests WHERE customers_id = $id AND status = 1 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCustomerCookRequests($id, $order) {

	global $conn;

	$sql = "SELECT * FROM cook_requests WHERE customers_id = $id AND status = 1 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCustomerDeclinedCookRequests($id, $order) {

	global $conn;

	$sql = "SELECT * FROM cook_requests WHERE customers_id = $id AND status = 0 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCustomerOrders($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE customers_id = $id AND (status = 1 OR status = 2 OR status = 3 OR status = 4 OR status = 5 OR status = 6 OR status = 7 OR status = 8 OR status = 9) ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCustomerMenu($query) {

	global $conn;

	$sql = "SELECT * FROM menus WHERE name LIKE '%{$query}%' OR description LIKE '%{$query}%' ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCustomerDeliveryHistory($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE status = 10 AND customers_id = $id ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

// TODO
function selectMostRequestedFoods() {

	global $conn;

	$sql = "SELECT * FROM cook_requests GROUP BY menus_id ORDER BY COUNT(menus_id) DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectMenuLimit($limit) {

	global $conn;

	$sql = "SELECT * FROM menus ORDER BY id DESC LIMIT $limit";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}
// CUSTOMERS

// COOKS
function selectCookRequests($order) {

	global $conn;

	$sql = "SELECT * FROM requests WHERE status = 1 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCookCustomerRequests($cooksId, $order) {

	global $conn;

	$sql = "SELECT * FROM cook_requests WHERE cooks_id = $cooksId AND status = 1 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCookOrders($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE cooks_id = $id AND (status = 1 OR status = 2 OR status = 3 OR status = 4 OR status = 5 OR status = 6) ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectCookDeliveryHistory($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE status >= 7 AND cooks_id = $id ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectAllCooks($query) {

	global $conn;

	$sql = "SELECT * FROM users WHERE role = 'cook' AND name LIKE '%{$query}%' ORDER BY id DESC";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}
// COOKS

// RIDERS
function selectRiderOrders($order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE status = 3 AND riders_id = 0 ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectRiderDeliveries($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE status <> 10 AND riders_id = $id ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}

function selectRiderDeliveryHistory($id, $order) {

	global $conn;

	$sql = "SELECT * FROM orders WHERE status = 10 AND riders_id = $id ORDER BY id $order";
	$result = mysqli_query($conn, $sql);

	$data = array();

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			array_push($data, $row);

		}

	}

	return $data;

}
// RIDERS

// OTHERS
function allowedRole($baseUrl, $role) {
	if ($_SESSION["role"] != $role) {
		header("Location: " . $baseUrl);
		exit();
	}
}

function redirect($baseUrl, $role) {
	if ($_SESSION["role"]) {
		header("Location: " . $baseUrl . $role);
		exit();
	} else {
		header("Location: " . $baseUrl);
		exit();
	}
}

function alert(){
	if (isset($_GET["error"])) {

	    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
	        echo $_GET["error"];
	        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	            echo "<span aria-hidden='true'>&times;</span>";
	        echo "</button>";
	    echo "</div>";

    } else if (isset($_GET["success"])) {

    	echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
	        echo "Success";
	        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
	            echo "<span aria-hidden='true'>&times;</span>";
	        echo "</button>";
	    echo "</div>";

    }
}

function value($get) {

	if (isset($_GET[$get])) {

		echo $_GET[$get];

	}

}
// OTHERS

function earnings($category) {

	global $conn;

	if ($category == "daily") {
		$date = date('Y-m-d');

		$sql = "SELECT SUM(earning) as earned FROM earnings WHERE created_at = '$date'";
		$result = mysqli_query($conn, $sql);

		$data = array();

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				array_push($data, $row);

			}

		}

		return $data;
	}

	if ($category == "monthly") {
		$date = date("Y-m-d");
		$first = date("Y-m-01");
		$last = date("Y-m-t");

		$sql = "SELECT SUM(earning) as earned FROM earnings WHERE created_at BETWEEN '$first' AND '$last'";
		$result = mysqli_query($conn, $sql);

		$data = array();

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				array_push($data, $row);

			}

		}

		return $data;
	}

	if ($category == "annualy") {
		$date = date("Y-m-d");
		$first = date("Y-01-01");
		$last = date("Y-12-t");

		$sql = "SELECT SUM(earning) as earned FROM earnings WHERE created_at BETWEEN '$first' AND '$last'";
		$result = mysqli_query($conn, $sql);

		$data = array();

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				array_push($data, $row);

			}

		}

		return $data;
	}

	if ($category == "total") {

		$sql = "SELECT SUM(earning) as earned FROM earnings";
		$result = mysqli_query($conn, $sql);

		$data = array();

		if (mysqli_num_rows($result) > 0) {

			while ($row = mysqli_fetch_assoc($result)) {

				array_push($data, $row);

			}

		}

		return $data;
	}

}