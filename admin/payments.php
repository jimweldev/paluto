<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Payments</h1>
    
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Orders ID</th>
                        <th>Name</th>
                        <th>Commission</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                foreach (select("payments", "DESC") as $row) {
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["orders_id"] . "</td>";

                        foreach (selectPK("users", $row["users_id"], "ASC") as $row2) {
                            echo "<td>" . $row2["name"] . "</td>";
                        }

                        echo "<td>₱" . number_format($row["commission"], 2) . "</td>";
                        echo "<td>" . $row["created_at"] . "</td>";
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