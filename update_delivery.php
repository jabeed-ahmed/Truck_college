
<?php
    require('Session.php');
    require_once "connection.php";

    $paramId = htmlspecialchars($_GET["id"]);
    $sql = "UPDATE bid_items SET isDelivered= 'Delivered' WHERE bidId= '$paramId'";

    if ($con->query($sql) === TRUE) {
        header("location: my_ad.php");
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
?>