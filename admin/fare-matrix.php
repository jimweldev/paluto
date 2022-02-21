<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Fare Matrix</h1>
    
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Place 1</th>
                        <th>Place 2</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                foreach (select("fare_matrix", "ASC") as $row) {
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";

                        foreach (selectPK("barangays", $row["place1_id"], "ASC") as $row2) {
                            echo "<td>" . $row2["name"] . "</td>";
                        }

                        foreach (selectPK("barangays", $row["place2_id"], "ASC") as $row2) {
                            echo "<td>" . $row2["name"] . "</td>";
                        }

                        echo "<td>₱" . number_format($row["price"], 2) . "</td>";
                    echo "</tr>";
                }

                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>