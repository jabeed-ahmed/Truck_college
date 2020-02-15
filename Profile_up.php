<?php
require('Session.php');
if($_SESSION['user_type'] == "Shipper"){
  $username=$_SESSION['mail'];
  $fname=mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_fname']));
  $lname=mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_lname']));
  $num=mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_number']));
  $profupqry="UPDATE user_s SET S_fname='$fname', S_lname='$lname', S_mnumber='$num' WHERE S_mail='$username'";
  $sql=mysqli_query($con,$profupqry) or die(mysqli_error($con));
  if ($sql) {
    header("location:Profile.php?=Profile_updated");
  }
  else{
    header("location:Profile.php?=Something_is_wrong");
  }
}
elseif ($_SESSION['user_type'] == "Carrier") {
  $username=$_SESSION['mail'];
  $name=mysqli_real_escape_string($con, htmlspecialchars($_POST['t_name']));
  $ownerName = mysqli_real_escape_string($con, htmlspecialchars($_POST['o_name']));
  $nov = mysqli_real_escape_string($con, htmlspecialchars($_POST['nov']));
  $num=mysqli_real_escape_string($con, htmlspecialchars($_POST['m_number']));
  $add = mysqli_real_escape_string($con, htmlspecialchars($_POST['t_add']));

  $profupqry="UPDATE user_t SET T_org_name='$name', T_owner_name='$ownerName', T_address = '$add', T_number='$num', T_no_vehicle = '$nov' WHERE T_mail='$username'";
  $sql=mysqli_query($con,$profupqry) or die(mysqli_error($con));
  if ($sql) {
    header("location:Profile.php?=Profile_updated");
  }
  else{
    header("location:Profile.php?=Something_is_wrong");
  }
}
