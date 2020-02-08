
<?php
require('Session.php');
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_price = $_REQUEST['price'];
    echo $input_price;

    $userId =  $_SESSION['user_id'];
    $paramId = htmlspecialchars($_GET["id"]);

    $query = "INSERT INTO bid_items (adId, status, userId, bid_price)
    VALUES ($paramId, '0', $userId, $input_price)";
            // $update = "UPDATE `ad`
            // SET product_name='".$product_name."',
            // product_category='".$product_category."'
            // WHERE product_id=".$product_id;
    $insertSQL = mysqli_query($con, $query) or die(mysqli_error($con));

    header('location:my_ad.php');
} else {
}
?>