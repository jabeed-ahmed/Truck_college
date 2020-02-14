<?php
require('Session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reciept List </title>
  <link rel="icon" type="image/ico" href="https://i.ibb.co/GQ6gw34/1544624867669.png" />
  <style media="screen">
    body {
      height: 100%;
      width: 100%;
    }
  </style>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" />
  <link rel="stylesheet" type="text/css" href="css/logreg.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-primary sticky-top">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Back</a>
      </li>
    </ul>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-10 col-sm-8 col-xs-12 center_div" style="margin-top:4%;">
        <form class="form-container1" action="E_receipt.php" method="post">
          <h2 align="center"><b>Receipts </h2><br>
          <div class="container-fluid">
            <table class="table">
              <thead>
                <tr>
                  <th>Deal No </th>
                  <th>Source</th>
                  <td>Destination</td>
                  <td>Date</td>
                  <th>Order-date</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $mail = $_SESSION['mail'];

                $USER_ID = $_SESSION['user_id'];

                $query = "SELECT ad.Source_ad, ad.destination, bid.CreatedAt, ad.AD_ID, bid.bid_price FROM `bid_items` bid 
                INNER JOIN ad ON ad.AD_id = bid.adId WHERE bid.userId = 18 and bid.status = 1";


                // $query = "SELECT * FROM `bid_items` bid 
                // INNER JOIN user_t u on bid.userId = u.T_id where bid.status = 1 and bid.userId = $USER_ID";

                // $query = "SELECT `source_ad`, `destination`, `order_date`, 
                // `ad_date` ,`ad_id` FROM `ad` where s_id=(select s_id from user_s where s_mail='$mail')";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));

                if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_array($result)) {
                    $source = $row[0];
                    $no_destination = $row[1];
                    $order_date = $row[2];
                    $ad_date = $row[2];
                    $ad_id = $row[3];
                    $cost = $row[4];

                    // $num = md5(rand($ad, 100000));
                    // $finalpass = substr($num, -8);

                ?>
                    <tr>
                      <td> <?php echo $ad_id; ?></td>
                      <td> <?php echo $source; ?> </td>
                      <td><?php echo $no_destination; ?></td>
                      <td> <?php echo $order_date; ?></td>
                      <td> <?php echo $cost; ?></td>
                    </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
    </form>
  </div>

</body>

</html>