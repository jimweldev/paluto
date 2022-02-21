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
                        <h1 class="h2 logo-font text-gray-900 mb-4">Login</h1>
                    </div>

                    <?= alert(); ?>

                    <form action="<?= $baseUrl; ?>assets/includes/sessions.inc.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Username" name="username" value="<?= value("username"); ?>" required>
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>

                        <button class="btn btn-main btn-block shadow-sm" type="submit" name="loginSubmit">
                            Submit
                        </button>
                    </form>

                    <hr>

                    <div class="text-center">
                        <a class="small" href="<?= $baseUrl; ?>register">Create an Account</a>
                    </div>
                </div>
                    
            </div>
        </div>

    </div>

</div>

<?php

include $baseUrl . "assets/templates/home/footer.inc.php";

?>