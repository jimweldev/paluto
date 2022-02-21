<?php

date_default_timezone_set("Asia/Manila");

include $baseUrl . "assets/includes/dbh.inc.php";

session_start();

allowedRole($baseUrl, "cook");

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

<body>

<div id="wrapper">

    <ul class="navbar-nav bg-main sidebar sidebar-dark accordion shadow-sm" id="accordionSidebar">

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $baseUrl; ?>cook">
            <div class="sidebar-brand-icon">
                <img class="main-logo" src="<?= $baseUrl; ?>assets/images/logo-2.1.png">
            </div>
            <div class="sidebar-brand-text mx-3 logo-font">Paluto</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/">
                <i class="fas fa-fw fa-pizza-slice"></i>
                <span>Orders</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/requests-page">
                <i class="fas fa-fw fa-file"></i>
                <span>Requests Page</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/my-menu">
                <i class="fas fa-utensils"></i>
                <span>My Menu</span></a>
        </li>       

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/order-history">
                <i class="fas fa-fw fa-history"></i>
                <span>Order History</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>cook/buy-load">
                <i class="fas fa-cash-register"></i>
                <span>Wallet</span></a>
        </li>

        <!-- <li class="nav-item">
            <a class="nav-link" href="<?= $baseUrl; ?>Admin/Reports">
                <i class="fas fa-fw fa-exclamation-circle"></i>
                <span>Reports</span></a>
        </li> -->

    </ul>

    <div id="content-wrapper" class="d-flex flex-column bg-white">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow-sm">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>

                            <?php

                            $usersId = $_SESSION["id"];

                            $sql = "SELECT a.* FROM notifications a INNER JOIN (SELECT id, users_id, orders_id, title, description, MAX(id) AS maxid FROM notifications WHERE users_id = $usersId GROUP BY orders_id) as b ON a.id = b.maxid ORDER BY a.id DESC";
                            $result = mysqli_query($conn, $sql);

                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo "<a class='dropdown-item d-flex align-items-center' href='#'>";
                                        echo "<div class='mr-3'>";
                                            echo "<div class='icon-circle bg-primary'>";
                                                echo "<i class='fas fa-file-alt text-white'></i>";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<div>";
                                            echo "<div class='small text-gray-500'>" . $row["title"] . "</div>";
                                            echo "<span class='font-weight-bold'>" . $row["description"] . "</span>";
                                        echo "</div>";
                                    echo "</a>";

                                }

                            }else {
                                echo "No notifications yet..";
                            }


                            ?>

                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-dark small"><?= $_SESSION["name"] ?></span>

                            <?php

                            foreach (selectPK("users", $_SESSION["id"], "ASC") as $row) {
                                echo "<img class='img-profile rounded' src='" . $baseUrl . "assets/uploads/profile-pictures/" . $row["profile_picture"] . "'>";
                            }

                            ?>
                            
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="<?= $baseUrl; ?>cook/profile">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="<?= $baseUrl; ?>assets/includes/sessions.inc.php?logout">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>

            <div class="container-fluid">