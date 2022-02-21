<?php

$baseUrl = "./";

include $baseUrl . "assets/templates/home/header.inc.php";

?>

<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-8 col-md-10">

        <div class="card o-hidden border-0 shadow-sm my-4">
            <div class="card-body p-0">

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h2 logo-font text-gray-900 mb-4">Register</h1>
                    </div>

                    <?= alert(); ?>

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

                        <input type="hidden" name="role" value="customer">

                        <button class="btn btn-main btn-block shadow-sm" type="submit" name="registerSubmit">
                            Submit
                        </button>
                    </form>

                    <hr>

                    <div class="text-center">
                        Already have an account? 
                        <a class="small" href="<?= $baseUrl; ?>login">Login</a>
                    </div>
                </div>
                    
            </div>
        </div>

    </div>

</div>

<?php

include $baseUrl . "assets/templates/home/footer.inc.php";

?>