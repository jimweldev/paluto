<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4 hide-on-print">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <button class="btn btn-sm btn-main shadow-sm" onclick="window.print()"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</button>
</div>

<header class="show-on-print">
    <div class="d-flex justify-content-between mb-4">
        <h2 class="text-main d-flex align-items-center">
            <img class="main-logo" src="<?= $baseUrl; ?>assets/images/logo-2.png">
            Paluto
        </h2>

        <span>
            <?= date('m/d/Y'); ?>
        </span>
    </div>

    <h1 class="text-center mb-5">Sales Report (<?= date('Y'); ?>)</h1>
</header>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-main shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-main text-uppercase mb-1">
                            Earnings (DAILY)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php

                        foreach (earnings("daily") as $row) {
                            if ($row["earned"] > 0) {
                                echo "₱" . number_format($row["earned"], 2);
                            } else {
                                echo "₱0.00";
                            }
                            
                        }

                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-main shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-main text-uppercase mb-1">
                            Earnings (MONTHLY)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php

                        foreach (earnings("monthly") as $row) {
                            if ($row["earned"] > 0) {
                                echo "₱" . number_format($row["earned"], 2);
                            } else {
                                echo "₱0.00";
                            }
                            
                        }

                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-main shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-main text-uppercase mb-1">
                            Earnings (ANNUALY)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php

                        foreach (earnings("annualy") as $row) {
                            if ($row["earned"] > 0) {
                                echo "₱" . number_format($row["earned"], 2);
                            } else {
                                echo "₱0.00";
                            }
                            
                        }

                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-main shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-main text-uppercase mb-1">
                            Earnings (TOTAL)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php

                        foreach (earnings("total") as $row) {
                            if ($row["earned"] > 0) {
                                echo "₱" . number_format($row["earned"], 2);
                            } else {
                                echo "₱0.00";
                            }
                            
                        }

                        ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="card shadow mb-4">
    <div
        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0">Earnings Overview</h6>
    </div>
    <!-- Card Body -->
    <div class="card-body">
        <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
        </div>
    </div>
</div>

<footer class="show-on-print mt-5">
    <p class="text-right mb-0"><u>Generated by: <?= $_SESSION["name"]; ?></u></p>
    <p class="text-right font-weight-bold">Admin</p>
</footer>

<?php

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>