<?php
require('Session.php');
$mail=$_SESSION['mail'];
$ad_id= mysqli_real_escape_string($con, htmlspecialchars($_GET['ad_id']));
$query="Delete from ad  WHERE AD_id = '$ad_id'
 AND S_id=(SELECT S_id FROM user_s WHERE S_mail='$mail')";
$sql=mysqli_query($con,$query) or die(mysqli_error($con));

echo $ad_id;

if($sql==1){
  echo $ad_id;
  header("location:index.php?Ad_Deleted");
}
else {
  echo "<h1 align='center'>Please Don't try to Hack Your Friends Site!!!!</h1>";
  setcookie(session_name(), "", time() - 3600); //send browser command remove sid from cookie
  session_destroy(); //remove sid-login from server storage
  session_write_close();
  header("refresh:3;url=Ad_view.php");
}
?>
