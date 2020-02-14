<?php
session_start();
if (isset($_SESSION['mail'])) {
  header("location:index.php");
}
?>

<html>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
</head>

</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") //check if Post is created or not!!!
{
  require("connection.php");
  if (isset($_POST['radioF'])) {
    $user = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['radioF']));
    $mail = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['User_email']));
    $pswd = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['User_pass']));

    $mail = strtolower($mail);
    // logim module for a shipper users data match and transfer futher use.....
    // shipper login error pls check below lines of code...
    if ($user == "Shipper") {
      $query = "SELECT S_mail,S_password FROM user_s WHERE S_mail='$mail' and S_password='$pswd' AND S_status=0 AND S_active=0 ";
      $sql = mysqli_query($con, $query) or die(mysqli_error($query));
      $count = mysqli_num_rows($sql);
      if ($count == 0) {
        echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong> Wrong Credential Please check Email & pasword Which you have been Used!! & contact admin if you have been Blocked!!</h4></div> </div>";
        header("refresh:4;url=login.php");
      } else {

        session_start();
        $_SESSION['mail'] = $mail;
        $_SESSION['user_type'] = $user;
        header('location:index.php');
        //echo "<h3>welcome</h3>" . $mail;
      }
    }
    // logim module for a trasport company users data match and transfer futher use.....
    // transport company login error pls check below lines of code...

    elseif ($user == "Transport") {
      $query1 = "SELECT T_mail,T_password FROM user_t WHERE T_mail='$mail' and T_password='$pswd' AND T_status=0 AND T_active=0";
      $sql1 = mysqli_query($con, $query1) or die(mysqli_error($query1));
      $count = mysqli_num_rows($sql1);
      if ($count == 0) {
        echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>Wrong Credential Please check Email & pasword Which you have been Used!! or contact admin if you have been Blocked!!</h4></div> </div>";
        header("refresh:4;url=login.php");
      } else {
        session_start();
        $_SESSION['mail'] = $mail;
        $_SESSION['user_type'] = $user;
        header("location:index.php");
      }
    }
  } else {
    echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>Wrong Credential Please select any of the one option like shipper or carrier!!</h4></div> </div>";
    header("refresh:4;url=login.php");
  }
} else {
  echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>&nbsp;&nbsp;it's seems Like you forgot to Click reCAPTCHA please Try again!! </h4></div> </div>";
  header("refresh:3;url=login.php"); //if user not check captcha and click the button!
}

?>