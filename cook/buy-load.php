<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Wallet</h1>


    <a class="btn btn-primary btn-sm disabled">
        <i class="fas fa-coins"></i>
        <?php

        foreach (selectPK("users", $_SESSION["id"]) as $row) {
            echo "<span>P" . number_format($row["balance"], 2) . "</span>";    
        }

        ?>
        
    </a>
</div>

<?= alert(); ?>

<div class="card shadow-sm mb-4">

    <form class="card-body" action="<?= $baseUrl; ?>assets/includes/loads.inc.php" method="POST">
        <div class="row">
            <div class="col-sm-4">
                <img class="rounded" src="<?= $baseUrl; ?>assets/images/gcash.png" width="100%">
            </div>
            <div class="col-sm-8">

                <?php 

                foreach (selectPK("users", $_SESSION["id"], "DESC") as $row) {
                    echo "<div class='row mb-4'>";
                        echo "<div class='col-sm-2'>";
                            echo "<img class='rounded shadow-sm' src='" . $baseUrl . "assets/uploads/profile-pictures/" . $row["profile_picture"] . "' width='100%'>";
                        echo "</div>";

                        echo "<div class='col-sm-10'>";
                            echo "<h3 class='mb-2'>" . $row["name"] . "</h3>";
                            echo "<h5 class='mb-4'>09354449578</h5>";
                        echo "</div>";
                            
                    echo "</div>";
                }

                ?>
                <h5 class="mb-3">Enter an amount</h5>

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">₱</span>
                    </div>

                    <input class="form-control" type="number" step="0.25" name="load" placeholder="">
                </div>

                <button class="btn btn-success" type="submit" name="cook">Submit</button>
            </div>
        </div>
    </form>

</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>