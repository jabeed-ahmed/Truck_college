<?php
if ($_POST) {
//require("connection.php");
require("Session.php");

 $username=mysqli_real_escape_string($con, htmlspecialchars($_SESSION['mail']));
  $source=mysqli_real_escape_string($con, htmlspecialchars($_POST['source']));
  $dest=mysqli_real_escape_string($con, htmlspecialchars($_POST['no_dest']));
  $luggage=mysqli_real_escape_string($con, htmlspecialchars($_POST['luggage']));
  $type=mysqli_real_escape_string($con, htmlspecialchars($_POST['type_luggage']));
  $weight=mysqli_real_escape_string($con, htmlspecialchars($_POST['waight']));
  $price=mysqli_real_escape_string($con, htmlspecialchars($_POST['price']));
  $order_date=mysqli_real_escape_string($con, htmlspecialchars($_POST['order_date']));
  $wheel=mysqli_real_escape_string($con, htmlspecialchars($_POST['wheel']));
  $sub=mysqli_real_escape_string($con, htmlspecialchars($_POST['sub_type']));
  $extra=mysqli_real_escape_string($con, htmlspecialchars($_POST['extra_req']));
  $DATE=mysqli_real_escape_string($con, htmlspecialchars(date("Y-m-d")));

$query="INSERT INTO `ad`(`AD_id`, `S_id`, `Source_ad`, `destination`, 
`luggage`, `type_luggage`, `weight`, `status`, 
`ad_date`,`order_date`, `vehicle_type`, `add_requirement`, `price`) 
VALUES (Null,(SELECT S_id FROM `user_s` WHERE S_mail='$username'),
'$source','$dest','$luggage','$type','$weight','1','$DATE','$order_date','$wheel','$extra', '$price')";

 /*$username= $_SESSION['mail'];
  $source=$_POST['source'];
  $dest=$_POST['no_dest'];
  $luggage=$_POST['luggage'];
  $type=$_POST['type_luggage'];
  $weight=$_POST['waight'];
  //$budget=$_POST['budget'];
  $order_date=$_POST['order_date'];
  $wheel=$_POST['wheel'];
  $sub=$_POST['sub_type'];
  $vehicle_type=$wheel.$sub;
  $extra=$_POST['extra_req'];
  $DATE=date("Y-m-d");
$query="INSERT INTO `ad`(`AD_id`, `S_id`, `source_s`, `no_destination`, `luggage`, `type_luggage`, `weight`, `status`, ,`date``order_date`, `vehicle_type`, `add_requirement`) VALUES (Null,(SELECT S_id FROM `user_s` WHERE S_mail='$username'),'$source','$dest','$luggage','$type','$weight','0','$DATE','$order_date','$vehicle_type','$extra')";
*/
$result=mysqli_query($con,$query) or die(mysqli_error($con));
if($result){
echo "Database inserted";
Header('location:Profile.php?Ad_Posted');
//header(home.php);
}
else
  {
 echo "sorryyy try on other sire";

}
}
?>
