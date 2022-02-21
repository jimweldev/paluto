<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order History</h1>

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

<div class="row">
    
    <?php

    if (count(selectCookDeliveryHistory($_SESSION["id"], "DESC")) == 0) {
        echo "<div class='col-lg-4'>";
            echo "<p>No order history to show..</p>";
        echo "</div>";
    }

    foreach (selectCookDeliveryHistory($_SESSION["id"], "DESC") as $row) {

        echo "<div class='col-lg-4'>";
            echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header bg-main text-white'>";
                    echo $row["name"];
                echo "</div>";

                echo "<div class='card-body'>";
                    echo "<p>" . $row["description"] . "</p>";

                    echo "<table class='mb-3 card-table'>";
                        echo "<tr>";
                            echo "<td>PAX:</td>";
                            echo "<td>&ensp;</td>";
                            echo "<td>" . $row["pax"] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>CUSTOMER:</td>";
                            echo "<td>&ensp;</td>";
                            foreach (selectPK("users", $row["customers_id"]) as $row2) {
                                echo "<td>" . $row2["name"] . "</td>";
                            }
                            
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>RIDER:</td>";
                            echo "<td>&ensp;</td>";
                            
                            if ($row["riders_id"] != 0) {
                                foreach (selectPK("users", $row["riders_id"]) as $row2) {
                                    echo "<td>" . $row2["name"] . "</td>";
                                }
                            } else {
                                echo "<td>--</td>";
                            }
                            
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td colspan='3'>&ensp;</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>DATE:</td>";
                            echo "<td>&ensp;</td>";

                            $monthDay = date('M d', strtotime($row["delivery_time"]));

                            echo "<td>" . $monthDay . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>TIME:</td>";
                            echo "<td>&ensp;</td>";

                            $time = date('h:i A', strtotime($row["delivery_time"]));

                            echo "<td>" . $time . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>FROM:</td>";
                            echo "<td>&ensp;</td>";
                            
                            foreach (selectPK("users", $row["cooks_id"]) as $row2) {
                                echo "<td>" . $row2["location"] . ", ";

                                foreach (selectPK("barangays", $row2["barangays_id"]) as $row3) {
                                    echo $row3["name"] . "</td>";
                                }

                            }

                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>TO:</td>";
                            echo "<td>&ensp;</td>";
                            
                            foreach (selectPK("users", $row["customers_id"]) as $row2) {
                                echo "<td>" . $row2["location"] . ", ";

                                foreach (selectPK("barangays", $row2["barangays_id"]) as $row3) {
                                    echo $row3["name"] . "</td>";
                                }

                            }

                        echo "</tr>";

                        echo "<tr>";
                            echo "<td colspan='3'>&ensp;</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td>PRICE:</td>";
                            echo "<td>&ensp;</td>";
                            if ($row["price"] != 0) {
                                echo "<td>₱" . number_format($row["price"], 2) . "</td>";
                            } else {
                                echo "<td>--</td>";
                            }
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>DELIVERY:</td>";
                            echo "<td>&ensp;</td>";
                            echo "<td>₱" . number_format($row["delivery"], 2) . "</td>";
                        echo "</tr>";

                        echo "<tr>";
                            echo "<td colspan='3'><hr></td>";
                        echo "</tr>";

                        echo "<tr class='font-weight-bold'>";
                            echo "<td>TOTAL:</td>";
                            echo "<td>&ensp;</td>";
                            if ($row["price"] != 0) {
                                echo "<td>₱" . (number_format($row["price"] + $row["delivery"], 2)) . "</td>";
                            } else {
                                echo "<td>--</td>";
                            }
                        echo "</tr>";
                    echo "</table>";

                    if ($row["cook_commission"] != 1) {
                        echo "<div class='btn-group btn-group-sm'>";

                            echo "<button class='btn btn-info disabled'>₱" . (10 / 100) * $row["price"] . "</button>";
                            echo "<a class='btn btn-info' href='" . $baseUrl . "assets/includes/cook/orders.inc.php?payCommission&id=" . $row["id"] . "'>Pay Commission</a> ";
                        echo "</div>";
                    } else {
                        echo "<a class='btn btn-sm btn-info disabled'>Paid</a> ";
                    }
                echo "</div>";
            echo "</div>";
        echo "</div>";

    }

    ?>

</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>