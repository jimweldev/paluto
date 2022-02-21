<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["addUserSubmit"])) {
	
	$name = $_POST["name"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	$role = $_POST["role"];

	$sql = "SELECT * FROM users WHERE username = '$username'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		header("Location: " . $baseUrl . "admin/add/user?error=Username is already taken&name=" . $name . "&username=" . $username);
		exit();

	} else {

		if ($password != $confirmPassword) {
			
			header("Location: " . $baseUrl . "admin/add/user?error=Passwords mismatch&name=" . $name . "&username=" . $username);
			exit();

		} else {

			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "INSERT INTO users (username, password, role, name, location, profile_picture, barangays_id, balance) VALUES ('$username', '$password', '$role', '$name', '123', 'profile.svg', 1, 0.00)";

			if (mysqli_query($conn, $sql)) {
		
				header("Location: " . $baseUrl . "admin/add/user?success");
				exit();

			}

		}

	}

}