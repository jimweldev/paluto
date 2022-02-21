<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/customer/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Cook Profile</h1>

<?php

foreach (selectPK("users", $_GET["id"], "DESC") as $row) {

    echo "<div class='row'>";
        echo "<div class='col-8 offset-2 col-md-4 offset-md-4'>";
            echo "<img class='rounded mb-4' src='../assets/uploads/profile-pictures/" . $row["profile_picture"] . "' width='100%'>";
        echo "</div>";
    echo "</div>";

    echo "<h2 class='text-center mb-4'>" . $row["name"] . "</h2>";

}

?>

<h4 class="mb-4">Menu</h4>

<div class="row">

<?php

foreach (selectFK("menus", "cooks_id", $_GET["id"], "DESC") as $row) {

    echo "<div class='col-lg-4'>";

            echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header embed-responsive embed-responsive-16by9 border-0 bg-white'>";
                    echo "<div class='embed-responsive-item d-flex justify-content-center'>";
                        echo "<img src='" . $baseUrl . "assets/uploads/food/" . $row["image"] . "' alt='Card image cap'>";
                    echo "</div>";
                echo "</div>";

                echo "<div class='card-body'>";
                    echo "<h5 class='card-title font-weight-bold'>" . $row["name"] . "</h5>";

                    echo "<p>" . $row["description"] . "</p>";

                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "customer/order-food?id=" . $row["id"] . "'>Order</a>";
                echo "</div>";

            echo "</div>";

        echo "</div>";

}

?>

</div>

<?php

include $baseUrl . "assets/templates/customer/footer.inc.php";

?>