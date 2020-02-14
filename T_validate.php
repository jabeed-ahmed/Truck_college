<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
</head>

</html>

<?php
$remoteip = $_SERVER['REMOTE_ADDR']; //checking ip address
//print_r($result); // print array from responce and convert JASON output to php!!
require("connection.php");
if ($_POST) {
  $company_name = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_company']));
  $owner_name = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_owner']));

  $carrier_mail = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_mail']));
  $carrier_number = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_number']));
  $carrier_alt_number = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_alt_num']));
  $no_vehicle = mysqli_real_escape_string($con, htmlspecialchars($_POST['no_vehicle']));
  $vehicle_type = mysqli_real_escape_string($con, htmlspecialchars($_POST['type_vehicle']));
  $address = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_address']));
  $service = mysqli_real_escape_string($con, htmlspecialchars($_POST['CARRIER_service']));
  $sec_type = mysqli_real_escape_string($con, htmlspecialchars($_POST['secq']));
  $sec_ans = mysqli_real_escape_string($con, htmlspecialchars($_POST['secans']));
  $password = mysqli_real_escape_string($con, htmlspecialchars($_POST['password']));
  $carrier_mail = strtolower($carrier_mail);

  //password creation code....
  $num = md5(rand(1, 100000));
  $finalpass = substr($num, -8);

  $select = mysqli_query($con, "SELECT `T_mail` FROM `user_t` WHERE `T_mail` = '" . $_POST['carrier_mail'] . "'") or exit(mysqli_error($connectionID));
  if (mysqli_num_rows($select)) {
    echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong> Wrong Credential Please check Email & pasword Which you have been Used!! & contact admin if you have been Blocked!!</h4></div> </div>";
    header("refresh:4;url=login.php");
  } else {
    $query = "INSERT INTO `user_t`( T_id,T_org_name, T_owner_name, T_mail, T_address, 
    T_number, T_anumber, Type_of_vehicle, T_no_vehicle, T_service,T_password,T_security_question,T_security_answer,T_status,T_active)
    		VALUES (null,'$company_name','$owner_name','$carrier_mail','$address',
        '$carrier_number','$carrier_alt_number',
        '$vehicle_type','$no_vehicle','$service','$password','$sec_type','$sec_ans','1','0')";

    $sql = mysqli_query($con, $query) or die(mysqli_error($con));
    if ($sql) {
      //echo "date inserted";
      $eename = $owner_name;
      $eemail = $carrier_mail;
      $password = $finalpass;
      $num = $carrier_number;
      header("refresh:3;url=login.php");
    } else {
      echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>Error in Query!!</h4></div> </div>";
      header("refresh:3;url=login.php");
    }
  }
  $con->close();
} else {
  echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>it seems You are forgot The reCAPTCHA!!</h4></div> </div>";
  header("refresh:3;url=Transport_registration.php");
}

?>