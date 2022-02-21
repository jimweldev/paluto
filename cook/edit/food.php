<?php

$baseUrl = "../../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Food</h1>    

    <a class="btn btn-info btn-sm" href="<?= $baseUrl; ?>cook/my-menu">Back</a>
</div>

<?= alert(); ?>

<?php

foreach (selectPK("menus", $_GET["id"]) as $row) { 

    echo "<div class='card shadow mb-4'>";
        echo "<form class='card-body' action='" . $baseUrl ."assets/includes/cook/profile.inc.php' method='POST' enctype='multipart/form-data' autocomplete='off'>";

            echo "<input type='hidden' value='" . $_GET["id"] . "' name='id'>";

            echo "<div class='form-group'>";
                echo "<input class='form-control' type='text' placeholder='Food' name='name' pattern='[a-zA-Z0-9\s]+' title='Symbols are not allowed' value='" . $row["name"] . "' required>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo "<textarea class='form-control' placeholder='Description' pattern='[a-zA-Z0-9\s\.,]+' title='Invalid Input' name='description'>" . $row["description"] . "</textarea>";
            echo "</div>";

            echo "<div class='form-group'>";
                echo "<label>Image</label>";
                echo "<input class='form-control' type='file' name='image' accept='image/*'>";
            echo "</div>";

            echo "<button class='btn btn-primary btn-user' type='submit' name='editFood'>";
                echo "Submit";
            echo "</button>";
        echo "</form>";
    echo "</div>";

}

?>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>