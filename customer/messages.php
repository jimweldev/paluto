<?php

$baseUrl = "../";

include $baseUrl . "assets/templates/customer/header.inc.php";

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Messages - <span class="text-main">Order #<?= $_GET["id"] ?></span></h1>

    <a href="<?= $baseUrl; ?>customer/orders" class="btn btn-sm btn-info shadow-sm">Back</a>
</div>

<div class="card mb-4 shadow-sm">
    
    <?php

        echo "<div class='card-header bg-main text-white'>";
            foreach (selectPK("orders", $_GET["id"]) as $row) {
                echo "" . $row["name"];
            }
        echo "</div>";

        echo "<div class='card-body chat' id='chat'>";
            foreach (selectFK("messages", "orders_id", $_GET["id"], "ASC") as $row) {

                if ($row["user_type"] != "Customer") {
                    echo "<div class=''>";
                        echo "<code class='text-secondary'><span class='font-weight-bold'>" . $row["user_type"] . ":</span> " . $monthDay = date('g:i A | M d', strtotime($row["created_at"])) . "</code>";
                    echo "</div>";

                    echo "<div class='bg-main text-white p-2 rounded mb-3 message'>";
                        echo $row["message"];
                    echo "</div>";
                } else {
                    echo "<div class='text-right'>";
                        echo "<code class='text-secondary'>" . $monthDay = date('g:i A | M d', strtotime($row["created_at"])) . "</code>";
                    echo "</div>";

                    echo "<div class='bg-gray-600 text-white p-2 rounded mb-3 message ml-auto'>";
                        echo $row["message"];
                    echo "</div>";
                }

            }
        echo "</div>";   

    ?>

    <div class="card-footer">

        <form class="input-group" action="<?= $baseUrl; ?>assets/includes/customer/messages.inc.php" method="POST" autocomplete="off">
            <input type="hidden" id="row" value="<?= count(selectFK("messages", "orders_id", $_GET["id"], "ASC")); ?>">
            <input type="hidden" name="id" id="id" value="<?= $_GET["id"]; ?>">

            <input class="form-control" type="text" rows="2" autofocus placeholder="Send messages" name="message" required>

            <div class="input-group-append input-group-addon">
                <button class="btn btn-main px-3" type="submit" name="sendMessage"><i class="fas fa-paper-plane"></i></button>
            </div>
        </form>

    </div>
</div>

<?php

include $baseUrl . "assets/templates/customer/footer.inc.php";

?>

<script>

    var row = document.getElementById("row").value;
    var id = document.getElementById("id").value;

    setInterval(function(){ 
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if (row != this.responseText) {
                    window.location.reload();
                }
            }
        };

        xmlhttp.open("GET", "../assets/includes/counters.inc.php?messages&id=" + id, true);
        xmlhttp.send();
    }, 1000);

</script>