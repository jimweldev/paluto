<?php

$baseUrl = "../../../";

include $baseUrl . "assets/includes/dbh.inc.php";

if (isset($_POST["updateProfileSubmit"])) {
	
	$id = $_POST["id"];
	$name = $_POST["name"];
	$password = $_POST["password"];
	$address = $_POST["address"];
	$barangayId = $_POST["barangayId"];

	$sql = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		if (password_verify($password, $row["password"])) {
			
			if (empty($_FILES['profilePicture']['tmp_name'])) {

				$sql = "UPDATE users SET name = '$name', barangays_id = $barangayId, location = '$address' WHERE id = $id";
				mysqli_query($conn, $sql);

				session_start();
				$_SESSION["name"] = $name;

				header("Location: " . $baseUrl . "cook/profile/?success");
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
				if (!mysqli_query($conn, $sql)) {
					echo $id . "<br>";
					echo $name . "<br>";
					echo $password . "<br>";
					echo $address . "<br>";
					echo $barangayId . "<br>";
					echo $fileName . "<br>";
					exit();
				}

				session_start();
				$_SESSION["name"] = $name;

				header("Location: " . $baseUrl . "cook/profile/?success");
				exit();

			}

		} else {

			header("Location: " . $baseUrl . "cook/profile/?error=Incorrect password");
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
		
		header("Location: " . $baseUrl . "cook/profile/change-password?error=Passwords mismatch");
		exit();

	}

	$sql = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {
		
		if (password_verify($oldPassword, $row["password"])) {

			$password = password_hash($password, PASSWORD_DEFAULT);

			$sql = "UPDATE users SET password = '$password' WHERE id = $id";
			mysqli_query($conn, $sql);

			header("Location: " . $baseUrl . "cook/profile/change-password?success");
			exit();

		} else {

			header("Location: " . $baseUrl . "cook/profile/change-password?error=Incorrect password");
			exit();

		}

	}

}

if (isset($_POST["addFood"])) {
	
	$id = $_POST["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];

	// UPLOAD IMAGE
	$fileName = $_FILES['image']['name'];
	$fileTmpName = $_FILES['image']['tmp_name'];

	$fileExt = explode(".", $fileName);
	$fileExt = strtolower(end($fileExt));

	$fileName = uniqid("", true) . "." . $fileExt;

	$fileDestination =  $baseUrl . "assets/uploads/food/" . $fileName;

	move_uploaded_file($fileTmpName, $fileDestination);

	$sql = "INSERT INTO menus (cooks_id, name, description, image) VALUES ($id, '$name', '$description', '$fileName')";

	if (mysqli_query($conn, $sql)) {

		header("Location: " . $baseUrl . "cook/add/food?success");
		exit();

	}

}

if (isset($_POST["editFood"])) {
	
	$id = $_POST["id"];
	$name = $_POST["name"];
	$description = $_POST["description"];

	if (empty($_FILES['image']['tmp_name'])) {

		$sql = "UPDATE menus SET name = '$name', description = '$description' WHERE id = $id";
		if (mysqli_query($conn, $sql)) {

			header("Location: " . $baseUrl . "cook/my-menu?success");
			exit();

		}

	} else {

		$fileName = $_FILES['image']['name'];
		$fileTmpName = $_FILES['image']['tmp_name'];

		$fileExt = explode(".", $fileName);
		$fileExt = strtolower(end($fileExt));

		$fileName = uniqid("", true) . "." . $fileExt;

		$fileDestination =  $baseUrl . "assets/uploads/food/" . $fileName;

		move_uploaded_file($fileTmpName, $fileDestination);

		$sql = "UPDATE menus SET name = '$name', description = '$description', image = '$fileName' WHERE id = $id";
		if (mysqli_query($conn, $sql)) {

			header("Location: " . $baseUrl . "cook/my-menu?success");
			exit();

		}

	}

}

if (isset($_GET["deleteFood"])) {

	$id = $_GET["id"];

	$sql = "DELETE FROM menus WHERE id = $id";

	if (mysqli_query($conn, $sql)) {

		header("Location: " . $baseUrl . "cook/my-menu?success");
		exit();

	}

}