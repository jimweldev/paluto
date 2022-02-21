<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Customer Requests</h1>

<div class="row">

<?php

if (count(selectCookCustomerRequests($_SESSION["id"], "DESC")) == 0) {
    echo "<div class='col-lg-4'>";
        echo "<p>No request to show..</p>";
    echo "</div>";
}

foreach (selectCookCustomerRequests($_SESSION["id"], "DESC") as $row) {

    echo "<input type='hidden' id='row' value='" . count(selectCookCustomerRequests($_SESSION["id"], "DESC")) . "'>";
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

                echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "assets/includes/cook/requests.inc.php?getCookRequest&id=" . $row["id"] . "'>Accept Request</a>";
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
    var id = document.getElementById("id").value;

    setInterval(function(){ 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (row != this.responseText) {
                    window.location.reload();
                }
            }
        };

        xmlhttp.open("GET", "../assets/includes/counters.inc.php?requests-cook-page&id=" + id, true);
        xmlhttp.send();
    }, 1000);

</script>