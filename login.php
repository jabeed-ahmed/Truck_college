<?php

require_once "connection.php";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $input_name = trim($_POST["User_email"]);
  $input_password = trim($_POST["User_pass"]);
  echo "<h3>welcome</h3>" . $input_name;

    $query = "SELECT Adm_mail,password FROM admin WHERE Adm_mail='$input_name' and password='$input_password'";
    $sql = mysqli_query($con, $query) or die(mysqli_error($query));
    $count = mysqli_num_rows($sql);
    if ($count == 0) {
        echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong> Wrong Credential Please check Email & pasword Which you have been Used!! & contact admin if you have been Blocked!!</h4></div> </div>";
        header("refresh:4;url=login.php");
    } else {
      session_start();
      $_SESSION['mail'] = $input_name;
      $_SESSION['user_type'] = 'Admin';
      header('location:home.php');
    }
}

?>


<?php
session_start();
if(isset($_SESSION['mail'])){
  header("location:index.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN Foinr Shipper & Carrier</title>
    <link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
<style media="screen">
body{
 height: 100%;
 width:100%;
 background-image: url("Image/Login.jpg");
 }
</style>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="css/logreg.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-4 col-sm-6 col-xs-10 center_div" style="margin-top:9%;background-color:white;">
         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <h2 align="center">LOGIN</h2><hr><br>
                   <div class="radio" class="col-md-6">
                     <div class="" style="text-align:center;">
                        <label>
                       <input type="radio" name="radioF" value="Admin"><strong>&nbsp;I am a Shipper</strong>
                     </label>&nbsp;&nbsp;&nbsp;
                     <label>
                        <input type="radio" name="radioF" value="Transport"><strong>&nbsp;I am a Carrier</strong>
                      </label>
                    </div><br>
                    </div>
                    <div class="form-group ">
                      <label for="lemail">Email</label>
                        <input type="text" name="User_email" class="form-control" placeholder="User Name" autocomplete="off"  maxlength="50" autofocus required>
                    </div>
                    <div class="form-group">
                      <label for="lpass">Password</label>
                        <input type="password" name="User_pass" class="form-control" placeholder="Password" autocomplete="off" title="8 Characters Minimum one Uppercase one Lower case preffered" maxlength="30" required>
                    </div>
                    <div align="center">
                    <div class="g-recaptcha" data-sitekey="6LfX7nQUAAAAACZdSxmsMfk765RdBf65BEh9kHx9"></div>
                  </div>  <br>
                    <div>
                      <input type="submit" class="btn btn-success btn-block" id="Hide" value="Get In"><br>
                      <div class="row">
                        <div class="col-6" style="text-align:left;">
                            <a href="index.php"> <code><-</code>Back to Home</a>
                        </div>
                          <div class="col-6" style="text-align:right;">
                            <a href="Forgot_pass.php" >Forgot Password??</a>
                              </div>
                    </div>
                    </div>
            </form>
          </div>
      </div>
    </div>
   
  </body>
</html>
<?php

}
?>
