<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>

    <a href="<?= $baseUrl; ?>admin/add/user" class="d-none btn btn-sm btn-info shadow-sm">Add Admin</a>
</div>
    
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Userame</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                foreach (select("users", "DESC") as $row) {
                    echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["username"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["role"] . "</td>";
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