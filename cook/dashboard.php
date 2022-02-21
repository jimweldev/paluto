<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<h1 class="h3 mb-3 text-gray-800">Dashboard</h1>

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

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>