<?php

$baseUrl = "../../";

include $baseUrl . "assets/templates/admin/header.inc.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Admin</h1>

    <a href="<?= $baseUrl; ?>admin/users" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Back</a>
</div>

<?= alert(); ?>
    
<div class="card shadow-sm mb-4">

    <form class="card-body" action="<?= $baseUrl; ?>assets/includes/admin/users.inc.php" method="POST" autocomplete="off">

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Name" name="name" pattern="[a-zA-Z\s]+" title="Numbers and Symbols are not allowed" required>
        </div>

        <div class="form-group">
            <input class="form-control" type="text" placeholder="Username" name="username" required>
        </div>

        <div class="form-group row">
            <div class="col-md-6 mb-3 mb-md-0">
                <input class="form-control" type="password" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>

            <div class="col-md-6">
                <input class="form-control" type="password" placeholder="Confirm Password" name="confirmPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            </div>
        </div>

        <input type="hidden" name="role" value="admin">

        <button class="btn btn-primary btn-user" type="submit" name="addUserSubmit">
            Submit
        </button>

    </form>
</div>

<?php

include $baseUrl . "assets/templates/admin/footer.inc.php";

?>