<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Orders</h1>

<?= alert(); ?>

<div class="row">

<?php

if (count(selectCookOrders($_SESSION["id"], "DESC")) == 0) {
    echo "<div class='col-lg-4'>";
        echo "<p>No order to show..</p>";
    echo "</div>";
}

foreach (selectCookOrders($_SESSION["id"], "DESC") as $row) {
    
    echo "<div class='col-lg-4'>";

        echo "<div class='card mb-4 shadow-sm'>";
            echo "<div class='card-header bg-main text-white'>";
                echo $row["name"];
            echo "</div>";

            echo "<div class='card-body'>";
                echo "<p>";
                    echo $row["description"];
                echo "</p>";

                echo "<p><span class='badge badge-success'>status: " . $row["status_description"] . "</span></p>";

                echo "<table class='mb-3 card-table'>";
                        echo "<tr>";
                            echo "<td>PAX:</td>";
                            echo "<td>&ensp;</td>";
                            echo "<td>" . $row["pax"] . "</td>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>Estimated time for food to be done:</td>";
                            echo "<td>&ensp;</td>";
                            
                            if ($row["estimated_time"] < date('Y-m-d h:i:s', time())) {
                                
                                echo "<td>--</td>";

                            } else {

                                echo "<td>" . date('h:i A', strtotime($row["estimated_time"])) . "</td>";

                            }

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

                echo "<a class='btn btn-sm btn-info' href='" . $baseUrl . "cook/messages?id=" . $row["id"] . "'>Message</a> ";
                if ($row["status"] == 1 || $row["status"] == 2) {
                echo "<a class='btn btn-sm btn-warning' href='" . $baseUrl . "cook/set-price?id=" .$row["id"] . "'>Set Price</a> ";
                }

                if ($row["status"] == 1 || $row["status"] == 2 || $row["status"] == 3 || $row["status"] == 4 || $row["status"] == 5) {
                    echo "<a class='btn btn-sm btn-danger' id='cancel' data-toggle='modal' data-target='#cancelModal' data-name='" . $row["name"] . "' data-href='" . $baseUrl . "assets/includes/cook/orders.inc.php?cancelOrder&id=" . $row["id"] . "'>Cancel Order</a> ";
                }

                if ($row["status"] == 4) {
                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/orders.inc.php?preparingIngredients&id=" . $row["id"] . "'>Preparing for ingredients</a> ";
                }

                if ($row["status"] == 5) {
                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/orders.inc.php?startedCookiing&id=" . $row["id"] . "'>Started Cooking</a> ";
                }

                if ($row["status"] == 5 || $row["status"] == 6) {
                    echo "<a class='btn btn-sm btn-warning' href='" . $baseUrl . "cook/estimated-time?id=" . $row["id"] . "'>Set Estimated time</a> ";
                }

                if ($row["status"] == 6) {
                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/orders.inc.php?doneCookiing&id=" . $row["id"] . "'>Done Cooking</a> ";
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

<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Cancel Order</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to cancel order <strong id="foodName"></strong>?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="#" id="confirmDelete">Confirm</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", "#cancel", function () {
        var name = $(this).data('name');
        $(".modal-body #foodName").html( name );
         
         var myHref = $(this).data('href');
         
         $("#confirmDelete").attr("href", myHref);
    });
</script>