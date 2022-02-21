<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Set Price</h1>

    <a href="<?= $baseUrl; ?>cook/" class="btn btn-sm btn-info shadow-sm">Back</a>
</div>

<div class="card mb-4 shadow-sm">

    <?php

    foreach (selectPK("orders", $_GET["id"]) as $row) {


        echo "<div class='card-header bg-main text-white'>";
            echo $row["name"];
        echo "</div>";

        echo "<form class='card-body' action='" . $baseUrl . "assets/includes/cook/set-price.inc.php' method='POST'>";
            echo "<p>Kindly add 10% to your rate for commission</p>";

            echo "<input type='hidden' value='" . $_GET["id"] . "' name='id'>";

            echo "<div class='input-group mb-3'>";
                echo "<div class='input-group-prepend'>";
                    echo "<span class='input-group-text'>₱</span>";
                echo "</div>";

                echo "<input class='form-control' type='number' step='0.25' name='price'>";
            echo "</div>";

            echo "<button class='btn btn-success btn-sm' type='submit' name='setPrice'>Submit</button>";
        echo "</form>";

    }

    ?>

</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>