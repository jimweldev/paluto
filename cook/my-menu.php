<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Menu</h1>    

    <a class="btn btn-info btn-sm" href="<?= $baseUrl; ?>cook/add/food">Add Food</a>
</div>

<?= alert(); ?>

<div class="row">

    <?php

    if (count(selectFK("menus", "cooks_id", $_SESSION["id"], "DESC")) == 0) {
        echo "<div class='col-lg-4'>";
            echo "<p>No food to show..</p>";
        echo "</div>";
    }

    foreach (selectFK("menus", "cooks_id", $_SESSION["id"], "DESC") as $row) {    

        echo "<div class='col-lg-4'>";

            echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header embed-responsive embed-responsive-16by9 border-0 bg-white'>";
                    echo "<div class='embed-responsive-item d-flex justify-content-center'>";
                        echo "<img src='" . $baseUrl . "assets/uploads/food/" . $row["image"] . "'>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='card-body'>";
                    echo "<h5 class='card-title font-weight-bold'>" . $row["name"] . "</h5>";

                    echo "<p>" . $row["description"] . "</p>";

                    echo "<a class='btn btn-sm btn-info' href='./edit/food?id=" . $row["id"] . "'>Edit</a> ";
                    echo "<a class='btn btn-danger btn-sm' id='delete' data-toggle='modal' data-target='#deleteModal' data-name='" . $row["name"] . "' data-href='" . $baseUrl . "assets/includes/cook/profile.inc.php?deleteFood&id=" . $row["id"] . "'>Delete</a>";
                echo "</div>";

            echo "</div>";

        echo "</div>";

    }

    ?>

</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete <strong id="foodName"></strong>?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <a class="btn btn-danger" href="#" id="confirmDelete">Delete</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("click", "#delete", function () {
        var name = $(this).data('name');
        $(".modal-body #foodName").html( name );
         
         var myHref = $(this).data('href');
         
         $("#confirmDelete").attr("href", myHref);
    });
</script>