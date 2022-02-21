<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/customer/header.inc.php";

?>

<h1 class="h3 mb-4 text-gray-800">Estimated Time</h1>

<?= alert(); ?>

<div class="card shadow mb-4">
	<form class="card-body"  action='../assets/includes/customer/orders.inc.php' method='POST'>
		<input type="hidden" name="ordersId" value="<?= $_GET["id"] ?>">
		<div class='form-group'>
            <label for='deliveryTime'>Delivery time</label>
            <input class='form-control' id='deliveryTime' type='datetime-local' min='<?= date("Y-m-d", strtotime("+ 1 Day")) . "T" . date('h:i') ?>' name='deliveryTime' required>
        </div>

        <button class='btn btn-primary btn-user' type='submit' name='updateDate'>
            Update
        </button>
	</form>
</div>

<?php

include $baseUrl . "assets/templates/customer/footer.inc.php";

?>