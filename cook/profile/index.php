<?php

$baseUrl = "../../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>


<h1 class="h3 mb-4 text-gray-800">Profile</h1>

<?= alert(); ?>

<div class="row">
    <div class="col-xl-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <ul class="list-group">
                    <a class="list-group-item text-decoration-none" href="<?= $baseUrl; ?>cook/profile">Update Profile</a>
                    <a class="list-group-item text-decoration-none" href="<?= $baseUrl; ?>cook/profile/change-password">Change Password</a>
                </ul>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-main">
                Update Profile
            </div>

            <form class="card-body" action="<?= $baseUrl; ?>assets/includes/cook/profile.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                <input type="hidden" value="<?= $_SESSION["id"]; ?>" name="id">

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" value="<?= $_SESSION["name"]; ?>" name="name" pattern="[a-zA-Z\s]+" title="Numbers and Symbols are not allowed" required>
                </div>

                <?php

                echo "<div class='form-group'>";
                    foreach (selectPK("users", $_SESSION["id"]) as $row) {
                        echo "<input class='form-control' type='text' placeholder='Address' name='address' value='" . $row["location"] . "' required>";
                    }
                    
                    echo "<small class='form-text text-muted'>123 Mansanas Street</small>";
                echo "</div>";

                ?>

                <div class="form-group">
                    <select class="form-control" name="barangayId">
                        <?php 

                        foreach (selectPK("users", $_SESSION["id"]) as $row) {
                            foreach (selectPK("barangays", $row["barangays_id"]) as $row2) {
                                echo $row2["name"];
                                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                            }
                        }

                        ?>
                        
                        <?php

                        foreach (select("barangays", "DESC") as $row) {
                            echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="profilePicture">Profile Picture</label>
                    <input class="form-control" id="profilePicture" type="file" name="profilePicture" accept="image/*">
                </div>

                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password" required>
                </div>

                <button class="btn btn-primary btn-user" type="submit" name="updateProfileSubmit">
                    Submit
                </button>

            </form>
        </div>
    </div>
</div>

<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>