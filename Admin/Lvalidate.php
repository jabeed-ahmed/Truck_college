<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
	<link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
</head>
</html>
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") //check if Post is created or not!!!
   {
  		$secret = '6LfX7nQUAAAAAM5UR8XIuOEStN2S5UtE3xWOhRK9'; //our secret key generated by Google
  		$response = @$_POST['g-recaptcha-response']; //responce from google inn variable
  		$remoteip = $_SERVER['REMOTE_ADDR']; //checking ip address
  		$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip"); //pass data to goole to verify im not robot!!
      $result = json_decode($url,TRUE); //we get responce from google in jason connvert them in array and gat the result
  		//print_r($result); // print array from responce and convert JASON output to php!!
      if ($result['success'] == TRUE) //check if result is sucess or not??
      {
          require("../connection.php");
          if(isset($_POST['radioF'])) {
              $user = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['radioF']));
              $mail = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['User_email']));
              $pswd = mysqli_real_escape_string($con, htmlspecialchars($_REQUEST['User_pass']));
              echo "Something went wrong. Please try again later.";
              $mail = strtolower($mail);
              // logim module for a shipper users data match and transfer futher use.....
              // shipper login error pls check below lines of code...
              if ($user == "Admin") {
                  $query = "SELECT Adm_mail,password FROM admin WHERE Adm_mail='$mail' and password='$pswd' AND P_status='0'";
                  $sql = mysqli_query($con, $query) or die(mysqli_error($query));
                  $count = mysqli_num_rows($sql);
                  if ($count == 0) {
                      echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong> Wrong Credential Please check Email & pasword Which you have been Used!! & contact admin if you have been Blocked!!</h4></div> </div>";
                      header("refresh:4;url=login.php");
                  } else {
                      session_start();
                      $_SESSION['mail'] = $mail;
                      $_SESSION['user_type'] = $user;
                      header('location:home.php');
                      echo "<h3>welcome</h3>" . $mail;
                  }
              }
              // logim module for a trasport company users data match and transfer futher use.....
              // transport company login error pls check below lines of code...

			  elseif ($user == "Police") {
                  $query1 = "SELECT Adm_mail,password FROM admin WHERE Adm_mail='$mail' and password='$pswd' AND P_status='1'";
                  $sql1 = mysqli_query($con, $query1) or die(mysqli_error($con));
                  $count = mysqli_num_rows($sql1);
                  if ($count == 0) {
                      echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>Wrong Credential Please check Email & pasword Which you have been Used!! or contact admin if you have been Blocked!!</h4></div> </div>";
                      header("refresh:4;url=login.php");
                  } else {
											session_start();
                      $_SESSION['mail'] = $mail;
                      $_SESSION['user_type'] = $user;
                      header("location:home.php");
                  }
              }
          }
					else {
						echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>Wrong Credential Please select any of the one option like shipper or carrier!!</h4></div> </div>";
						header("refresh:4;url=login.php");
					}
      }
      else
      {
        echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong>&nbsp;&nbsp;it's seems Like you forgot to Click reCAPTCHA please Try again!! </h4></div> </div>";
          header( "refresh:3;url=login.php" );//if user not check captcha and click the button!
      }
    }
    else
    {
      echo "Session not created try again!!"."Error page here if user direct redirect to this link"; //check if session created or not
    }


?>
