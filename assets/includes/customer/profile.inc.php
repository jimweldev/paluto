<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["updateProfileSubmit"])) {
	
	$id = $_POST["id"];
	$name = $_POST["name"];
	$address = $_POST["address"];
	$barangayId = $_POST["barangayId"];
	$password = $_POST["password"];

	$sql = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		if (password_verify($password, $row["password"])) {

			if (!empty($barangayId)) {
				
				$sql = "UPDATE users SET barangays_id = $barangayId WHERE id = $id";
				mysqli_query($conn, $sql);

			}
			
			if (empty($_FILES['profilePicture']['tmp_name'])) {

				$sql = "UPDATE users SET name = '$name', barangays_id = $barangayId, location = '$address' WHERE id = $id";
				mysqli_query($conn, $sql);

				session_start();
				$_SESSION["name"] = $name;

				header("Location: " . $baseUrl . "customer/profile/?success");
				exit();

			} else {

				$fileName = $_FILES['profilePicture']['name'];
				$fileTmpName = $_FILES['profilePicture']['tmp_name'];

				$fileExt = explode(".", $fileName);
				$fileExt = strtolower(end($fileExt));

				$fileName = uniqid("", true) . "." . $fileExt;

				$fileDestination =  $baseUrl . "assets/uploads/profile-pictures/" . $fileName;

				move_uploaded_file($fileTmpName, $fileDestination);

				$sql = "UPDATE users SET name = '$name', profile_picture = '$fileName', barangays_id = $barangayId, location = '$address' WHERE id = $id";
				mysqli_query($conn, $sql);

				session_start();
				$_SESSION["name"] = $name;

				header("Location: " . $baseUrl . "customer/profile/?success");
				exit();

			}

		} else {

			header("Location: " . $baseUrl . "customer/profile/?error=Incorrect password");
			exit();

		}

	}

}

if (isset($_POST["changePasswordSubmit"])) {
	
	$id = $_POST["id"];
	$password = $_POST["password"];
	$confirmPassword = $_POST["confirmPassword"];
	$oldPassword = $_POST["oldPassword"];

	if ($password != $confirmPassword) {
		
		header("Location: " . $baseUrl . "customer/profile/change-password?error=Passwords mismatch");
		exit();

	}

	$sql = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		
		if (password_verify($oldPassword, $row["password"])) {

			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "UPDATE users SET password = '$password' WHERE id = $id";
			mysqli_query($conn, $sql);

			header("Location: " . $baseUrl . "customer/profile/change-password?success");
			exit();

		} else {

			header("Location: " . $baseUrl . "customer/profile/change-password?error=Incorrect password");
			exit();

		}

	}

}