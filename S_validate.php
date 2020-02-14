<html>

<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
	<link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
</head>

</html>
<?php

require("connection.php");
//mysqli_connect("localhost", "root", "") or die(mysql_error());
//mysqli_select_db("hire_truck_demo") or die(mysql_error());
if ($_POST) {
	$Shipper_fname = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_fname']));
	$Shipper_lname = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_lname']));
	$Shipper_mail = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_mail']));
	$Shipper_password = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_password']));
	$Shipper_number = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_number']));
	$Shipper_address = mysqli_real_escape_string($con, htmlspecialchars($_POST['SHIPPER_address']));
	$sec_type = mysqli_real_escape_string($con, htmlspecialchars($_POST['secq']));
	$sec_ans = mysqli_real_escape_string($con, htmlspecialchars($_POST['secans']));
	$Shipper_mail = strtolower($Shipper_mail);
	$num = md5(rand(5, 10));
	$finalpasss = substr($num, -8);


	$select = mysqli_query($con, "SELECT `S_mail` FROM `user_s` WHERE `S_mail` = '" . $_POST['SHIPPER_mail'] . "'") or exit(mysqli_error($connectionID));
	if (mysqli_num_rows($select)) {
		echo "<div class='container'> <div class='alert alert-danger' role='alert' style='text-align:center; margin-top:25%;padding-top:2%;padding-bottom:2%' ></h4> <strong>Ohh Snap!!!</strong> Wrong Credential Please check Email & pasword Which you have been Used!! & contact admin if you have been Blocked!!</h4></div> </div>";
		header("refresh:4;url=login.php");
	} else {
		$query = $query = "insert into user_s(S_fname,S_lname,S_mail,S_mnumber,S_address,S_password,S_security_question,S_security_answer,S_status,S_active) 
		VALUES('$Shipper_fname','$Shipper_lname','$Shipper_mail','$Shipper_number','$Shipper_address','$Shipper_password','$sec_type','$sec_ans','2','0')";
		$sql = mysqli_query($con, $query) or die(mysqli_error($query));
		if ($sql) {
			//echo "date inserted";
			$eename = $Shipper_fname;
			$eemail = $Shipper_mail;
			$password = $Shipper_password;
			$num = $Shipper_number;
			header("refresh:3;url=login.php");
		} else {
			echo " error over query!!";
			header("refresh:3;url=login.php");
		}
	}
	$con->close();
}

?>