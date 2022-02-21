<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<?= alert(); ?>

<h1 class="h3 mb-3 text-gray-800">Register</h1>

<div class="row">
    <div class="col-lg-4 offset-lg-4">
        <form action="<?= $baseUrl; ?>assets/includes/sessions.inc.php" method="POST" autocomplete="off">
            <div class="form-group">
                <input class="form-control" type="text" placeholder="Name" name="name" value="<?= value("name"); ?>" pattern="[a-zA-Z\s]+" title="Numbers and Symbols are not allowed" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" placeholder="Address" name="address" value="<?= value("address"); ?>" pattern="[a-zA-Z0-9\s\.,]+" title="Numbers and Symbols are not allowed" required>
                <small class="form-text text-muted">123 Mansanas Street</small>
            </div>

            <div class="form-group">
                <select class="form-control" name="barangayId" required>
                    <option value="">-- Select Barangay --</option>
                    
                    <?php

                    foreach (select("barangays", "ASC") as $row) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control" type="text" placeholder="Username" name="username" value="<?= value("username"); ?>" pattern="[a-zA-Z0-9_.\-]{6,}" title="Only accepts letters, numbers, .(dot), -(dash), and underscore and atleast 6 or more characters" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>

            <div class="form-group">
                <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>

            <div class="form-group">
                <select class="form-control" name="role" required>
                    <option value="">-- Select role --</option>
                    <option value="cook">Cook</option>
                    <option value="rider">Rider</option>
                </select>
            </div>

            <button class="btn btn-main btn-block shadow-sm" type="submit" name="registerSubmit">
                Submit
            </button>
        </form>
    </div>
</div>

<?php

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>