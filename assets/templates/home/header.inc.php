<?php 

date_default_timezone_set("Asia/Manila");

include $baseUrl . "assets/includes/dbh.inc.php";

session_start();

if (isset($_SESSION["role"])) {

    redirect($baseUrl, $_SESSION["role"]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Paluto</title>
    <link rel="icon" type="image/x-icon" href="<?= $baseUrl; ?>assets/images/logo-3.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/4.1.4/css/sb-admin-2.min.css" integrity="sha512-Mk4n0eeNdGiUHlWvZRybiowkcu+Fo2t4XwsJyyDghASMeFGH6yUXcdDI3CKq12an5J8fq4EFzRVRdbjerO3RmQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-PT0RvABaDhDQugEbpNMwgYBCnGCiTZMh9yOzUsJHDgl/dMhD9yjHAwoumnUk3JydV3QTcIkNDuN40CJxik5+WQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?= $baseUrl; ?>assets/css/main.css" rel="stylesheet">
</head>
<body class="bg-gradient-light">

<nav class="navbar navbar-expand-xl navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?= $baseUrl; ?>">
            <img src="<?= $baseUrl; ?>assets/images/logo-2.png" height="50">
            <span class="text-main">Paluto</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./#about">About</a>
                </li>
            </ul>
            <form class="navbar-nav my-2 my-lg-0">
                <a class="btn btn-light my-xl-2 my-sm-1 mr-xl-2" href="<?= $baseUrl; ?>login">Login</a>
                <a class="btn btn-main my-xl-2 my-sm-1 d-none d-sm-block" href="https://jimweldizon18.github.io/paluto/assets/paluto.apk" download>
                    <i class="fas fa-download"></i>
                    Download APK
                </a>
            </form>
        </div>
    </div>
</nav>

<div class="container">

