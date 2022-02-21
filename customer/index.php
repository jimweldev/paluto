<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/customer/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Home</h1>

<a class="btn btn-main btn-lg btn-block mb-2 shadow-sm" href="<?= $baseUrl; ?>customer/paluto">
    Paluto 
    <i class="fas fa-fire"></i> 
</a>

<form class="input-group mb-4" action="<?= $baseUrl; ?>assets/includes/customer/search.inc.php" method="POST">
    <input class="form-control form-control-lg" type="text" name="query" placeholder="Search food for your cravings..." required>

    <div class="input-group-append">
        <button class="btn btn-main btn-lg px-4" type="submit" name="searchMenu"><i class="fas fa-search"></i></button>
    </div>
</form>

<div class="mb-3 d-flex justify-content-between">
    <h1 class="h5 mb-0 text-gray-800">Menu</h1>

    <a class="btn btn-secondary btn-sm" href="./search?q=">View all</a>
</div>

<div class="row">

    <?php

    if (count(select("menus", "DESC")) == 0) {
        echo "<div class='col-lg-4'>";
            echo "<p>No food to show..</p>";
        echo "</div>";
    }

    foreach (selectMenuLimit(6) as $row) {    

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

                    echo "<table class='mb-3 card-table'>";
                        echo "<tr>";
                            echo "<td>Cook:</td>";
                            echo "<td>&ensp;</td>";

                            foreach (selectPK("users", $row["cooks_id"]) as $row2) {
                                
                                echo "<td><a class='text-muted' href='./cook-profile?id=" . $row["cooks_id"] . "'/>" . $row2["name"] . "</td>";

                            }
                            
                        echo "</tr>";
                    echo "</table>";

                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "customer/order-food?id=" . $row["id"] . "'>Order</a>";
                echo "</div>";

            echo "</div>";

        echo "</div>";

    }

    ?>

</div>

<h1 class="h5 mb-3 text-gray-800">Top 3 requested foods</h1>

<div class="row">
    
    <?php

    foreach (selectMostRequestedFoods() as $row) {    

        echo "<div class='col-lg-4'>";

            echo "<div class='card mb-4 shadow-sm'>";
                echo "<div class='card-header embed-responsive embed-responsive-16by9 border-0 bg-white'>";
                    echo "<div class='embed-responsive-item d-flex justify-content-center'>";

                        foreach (selectPK("menus", $row["menus_id"]) as $row2) {
                            echo "<img src='" . $baseUrl . "assets/uploads/food/" . $row2["image"] . "' alt='Card image cap'>";
                        }
                        
                    echo "</div>";
                echo "</div>";

                echo "<div class='card-body'>";
                    echo "<h5 class='card-title font-weight-bold'>" . $row["name"] . "</h5>";

                    echo "<p>" . $row["description"] . "</p>";

                    echo "<table class='mb-3 card-table'>";
                        echo "<tr>";
                            echo "<td>Cook:</td>";
                            echo "<td>&ensp;</td>";

                            foreach (selectPK("users", $row["cooks_id"]) as $row2) {
                                
                                echo "<td><a class='text-muted' href='./cook-profile?id=" . $row["cooks_id"] . "'/>" . $row2["name"] . "</td>";

                            }
                            
                        echo "</tr>";
                    echo "</table>";

                    echo "<a class='btn btn-sm btn-success' href='" . $baseUrl . "customer/order-food?id=" . $row["menus_id"] . "'>Order</a>";
                echo "</div>";

            echo "</div>";

        echo "</div>";

    }

    ?>
    
</div>

<?php

include $baseUrl . "assets/templates/customer/footer.inc.php";

?>