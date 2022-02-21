<?php

$baseUrl = "../../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Food</h1>    

    <a class="btn btn-info btn-sm" href="<?= $baseUrl; ?>cook/my-menu">Back</a>
</div>

<?= alert(); ?>

<div class="card shadow mb-4">
    <form class="card-body" action="<?= $baseUrl; ?>assets/includes/cook/profile.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">

        <input type="hidden" value="<?= $_SESSION["id"]; ?>" name="id">

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Food" name="name" pattern="[a-zA-Z0-9\s]+" title="Symbols are not allowed" required>
        </div>

        <div class="form-group">
            <textarea class="form-control" placeholder="Description" pattern="[a-zA-Z0-9\s\.,]+" title="Invalid Input" name="description"></textarea>
        </div>

        <div class="form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image" accept="image/*" required>
        </div>

        <button class="btn btn-primary btn-user" type="submit" name="addFood">
            Submit
        </button>

    </form>
</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>