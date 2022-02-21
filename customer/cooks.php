<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/customer/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Cooks</h1>

<form class="input-group mb-4" action="<?= $baseUrl; ?>assets/includes/customer/search.inc.php" method="POST">
    <input class="form-control form-control-lg" type="text" name="query" placeholder="Search cook..." required>

    <div class="input-group-append">
        <button class="btn btn-main btn-lg" type="submit" name="searchCook"><i class="fas fa-search"></i></button>
    </div>
</form>

<?php 

if (count(selectAllCooks($_GET["q"])) == 0) {
    echo "<h4>No results found..</h4>";
}

foreach (selectAllCooks($_GET["q"]) as $row) {

    echo "<div class='card shadow-sm mb-4'>";
        echo "<div class='card-body'>";
            echo "<div class='row'>";
                echo "<div class='col-4 col-lg-2'>";
                    echo "<img class='rounded' src='../assets/uploads/profile-pictures/" . $row["profile_picture"] . "' width='100%'>";
                echo "</div>";

                echo "<div class='col-8 col-lg-10'>";
                    echo "<h3 class='mb-3'>" . $row["name"] . "</h3>";

                    foreach (selectPK("barangays", $row["id"], "DESC") as $row2) {

                        echo "<p class='mb-3'>" . $row["location"] . ", " . $row2["name"] . "</p>";

                    }
                    
                    echo "<a class='btn btn-main btn-sm' href='./cook-profile?id=" . $row["id"] . "'>View</a>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";

}

?>

<?php

include $baseUrl . "assets/templates/customer/footer.inc.php";

?>