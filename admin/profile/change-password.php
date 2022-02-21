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
                Change Password
            </div>

            <form class="card-body" action="<?= $baseUrl; ?>assets/includes/admin/profile.inc.php" method="POST">
                
                <input type="hidden" value="<?= $_SESSION["id"]; ?>" name="id">

                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Old Password" name="oldPassword" required>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <input class="form-control" type="password" placeholder="New Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>

                    <div class="col-md-6">
                        <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                    </div>
                </div>

                <button class="btn btn-primary btn-user" type="submit" name="changePasswordSubmit">
                    Submit
                </button>

            </form>
        </div>
    </div>
</div>

<?php

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>