<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<?= alert(); ?>

<?php

if (count(selectCookCustomerRequests($_SESSION["id"], "DESC")) > 0) {
    echo "<h1 class='h3 mb-4 text-gray-800'>Requests from your menu</h1>";

    echo "<div class='row'>";
        foreach (selectCookCustomerRequests($_SESSION["id"], "DESC") as $row) {

            echo "<input type='hidden' id='id' value='" . $_SESSION["id"] . "'>";

            echo "<div class='col-lg-4'>";

                echo "<div class='card mb-4 shadow-sm'>";
                    echo "<div class='card-header bg-main text-white'>";
                        echo $row["name"];
                    echo "</div>";

                    echo "<div class='card-body'>";
                        echo "<p>";
                            echo $row["description"];
                        echo "</p>";

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
                                echo "<td>LOCATION:</td>";
                                echo "<td>&ensp;</td>";
                                foreach (selectPK("users", $row["customers_id"]) as $row2) {
                                        echo "<td>" . $row2["location"] . ", ";

                                        foreach (selectPK("barangays", $row2["barangays_id"]) as $row3) {
                                            echo $row3["name"] . "</td>";
                                        }

                                    }
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
                            
                        echo "</table>";

                        echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/requests.inc.php?getCookRequest&id=" . $row["id"] . "'>Accept</a> ";
                        // ETO
                        echo "<a class='btn btn-sm btn-danger' id='decline' data-toggle='modal' data-target='#declineModal' data-name='" . $row["name"] . "' data-href='" . $baseUrl . "assets/includes/cook/requests.inc.php?declineCookRequest&id=" . $row["id"] . "'>Decline</a>";
                    echo "</div>";
                echo "</div>";

            echo "</div>";
        }
    echo "</div>";
}

?>

<h1 class="h3 mb-4 text-gray-800">Global Requests</h1>

<div class="row">

<?php

if (count(selectCookRequests("DESC")) == 0) {
    echo "<div class='col-lg-4'>";
        echo "<p>No requests to show..</p>";
    echo "</div>";
}

foreach (selectCookRequests("DESC") as $row) {

    echo "<input type='hidden' id='row' value='" . count(selectCookRequests("DESC")) . "'>";

    echo "<div class='col-lg-4'>";

        echo "<div class='card mb-4 shadow-sm'>";
            echo "<div class='card-header bg-main text-white'>";
                echo $row["name"];
            echo "</div>";

            echo "<div class='card-body'>";
                echo "<p>";
                    echo $row["description"];
                echo "</p>";

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
                        echo "<td>LOCATION:</td>";
                        echo "<td>&ensp;</td>";
                        foreach (selectPK("users", $row["customers_id"]) as $row2) {
                                echo "<td>" . $row2["location"] . ", ";

                                foreach (selectPK("barangays", $row2["barangays_id"]) as $row3) {
                                    echo $row3["name"] . "</td>";
                                }

                            }
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
                    
                echo "</table>";

                echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/requests.inc.php?getRequest&id=" . $row["id"] . "'>Get Request</a>";
            echo "</div>";
        echo "</div>";

    echo "</div>";
}

?>

</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>

<script>

    var row = document.getElementById("row").value;

    setInterval(function(){ 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (row != this.responseText) {
                    window.location.reload();
                }
            }
        };

        xmlhttp.open("GET", "../assets/includes/counters.inc.php?requests-page", true);
        xmlhttp.send();
    }, 1000);

</script>

<div class="modal fade" id="declineModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Decline Request</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to decline <strong id="foodName"></strong>?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="#" id="confirmDecline">Confirm</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", "#decline", function () {
        var name = $(this).data('name');
        $(".modal-body #foodName").html( name );
         
         var myHref = $(this).data('href');
         
         $("#confirmDecline").attr("href", myHref);
    });
</script>