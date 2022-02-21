<?php

$baseUrl = "../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["registerSubmit"])) {

	$name = mysqli_real_escape_string($conn, $_POST["name"]);
	$address = mysqli_real_escape_string($conn, $_POST["address"]);
	$barangayId = mysqli_real_escape_string($conn, $_POST["barangayId"]);
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	$confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
	$role = $_POST["role"];

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		header("Location: " . $baseUrl . "register?error=Username is already taken&name=" . $name . "&username=" . $username . "&address=" . $address);
		exit();

	} else {

		if ($password != $confirmPassword) {
			
			header("Location: " . $baseUrl . "register?error=Passwords mismatch&name=" . $name . "&username=" . $username . "&address=" . $address);
			exit();

		} else {

			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO users (username, password, role, name, location, profile_picture, barangays_id, balance) VALUES ('$username', '$password', '$role', '$name', '$address', 'profile.svg', $barangayId, 0.00)";

			if (mysqli_query($conn, $sql)) {

				if ($role == "customer") {
					
					session_start();
					session_regenerate_id();
					$_SESSION["id"] = mysqli_insert_id($conn);
					$_SESSION["name"] = $name;
					$_SESSION["username"] = $username;
					$_SESSION["role"] = $role;
					session_write_close();

					redirect($baseUrl, $role);

				} else {

					header("Location: " . $baseUrl . "admin/register?success");
					exit();

				}

			}

		}

	}

}

if (isset($_POST["loginSubmit"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];
	
	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		while ($row = mysqli_fetch_assoc($result)) {

			if (password_verify($password, $row["password"])) {
				
				session_start();
				session_regenerate_id();
				$_SESSION["id"] = $row["id"];
				$_SESSION["name"] = $row["name"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["role"] = $row["role"];
				session_write_close();

				redirect($baseUrl, $row["role"]);

			} else {

				header("Location: " . $baseUrl . "login?error=Incorrect password&username=" . $username);
				exit();

			}

		}

	} else {

		header("Location: " . $baseUrl . "login?error=Username not found&username=" . $username);
		exit();

	}

}

if (isset($_GET["logout"])) {
	
	session_start();
	session_destroy();

	header("Location: " . $baseUrl);
	exit();

}