<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Barangays</h1>
    
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Barangay</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                foreach (select("barangays", "ASC") as $row) {
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
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