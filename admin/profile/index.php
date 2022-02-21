<?php

$baseUrl = "../../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>


<h1 class="h3 mb-4 text-gray-800">Profile</h1>

<?= alert(); ?>

<div class="row">
    <div class="col-xl-4">
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <ul class="list-group">
                    <a class="list-group-item text-decoration-none" href="<?= $baseUrl; ?>admin/profile">Update Profile</a>
                    <a class="list-group-item text-decoration-none" href="<?= $baseUrl; ?>admin/profile/change-password">Change Password</a>
                </ul>

            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="card shadow-sm mb-4">
            <div class="card-header">
                Update Profile
            </div>

            <form class="card-body" action="<?= $baseUrl; ?>assets/includes/admin/profile.inc.php" method="POST" enctype="multipart/form-data" autocomplete="off">

                <input type="hidden" value="<?= $_SESSION["id"]; ?>" name="id">

                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" value="<?= $_SESSION["name"]; ?>" name="name" pattern="[a-zA-Z\s]+" title="Numbers and Symbols are not allowed" required>
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

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>