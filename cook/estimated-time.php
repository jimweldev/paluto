<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/cook/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Set Estimated Time</h1>

<?= alert(); ?>

<div class="card shadow mb-4">
    <form class="card-body"  action='../assets/includes/cook/orders.inc.php' method='POST'>
        <input type="hidden" name="ordersId" value="<?= $_GET["id"] ?>">
        <div class='form-group'>
            <label for='deliveryTime'>Estimated time for food to be done</label>
            <input class='form-control' id='deliveryTime' type='datetime-local' name='estimatedTime' required>
        </div>

        <button class='btn btn-primary btn-user' type='submit' name='estimatedTimeSubmit'>
            Set
        </button>
    </form>
</div>



<?php

include $baseUrl . "assets/templates/cook/footer.inc.php";

?>