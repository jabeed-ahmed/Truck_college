<?php
require('Session.php');
$mail=$_SESSION['mail'];

$paramId = htmlspecialchars($_GET["id"]);

// sql to delete a record
$sql = "DELETE FROM bid_items WHERE bidId =$paramId";

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("location:index.php");
} else {
    echo "Error deleting record: " . $con->error;
}

$con->close();

?>