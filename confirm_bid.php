
<?php
require('Session.php');
require_once "connection.php";

$userId =  $_SESSION['user_id'];
$paramId = htmlspecialchars($_GET["id"]);
$adId = htmlspecialchars($_GET["adId"]);

$update = "UPDATE `bid_items`
SET status='1' WHERE bidId=" . $paramId;

$updateADQuery = "UPDATE `ad`
SET status='0' WHERE AD_id=" . $adId;

if (mysqli_query($con, $update) && mysqli_query($con, $updateADQuery)) {
    echo "Records were updated successfully.";
    header('location:index.php');
} else {
    echo "ERROR: Could not able to execute $update. " . mysqli_error($con);
}
?>