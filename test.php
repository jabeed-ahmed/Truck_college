<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Truck</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    .bs-example {
      margin: 20px;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  </script>
</head>

<body>
  <nav class="navbar navbar-expand-sm bg-primary sticky-top">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="index.php">Home</a>
      </li>
    </ul>
  </nav><br><br>

  <div class="bs-example">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header clearfix">
            <h2 class="pull-left">Show Bids</h2>
            <br />
          </div>
          <?php
          require('Session.php');

          require_once "connection.php";
          $paramId = htmlspecialchars($_GET["id"]);
          $query = "SELECT bid.bidId, ad.AD_id as adId, ad.Source_ad as sourc_ad, bid.bid_price, ad.price, 
          bid.status, ad.destination FROM `bid_items` bid 
          Inner JOIN ad 
          on ad.AD_id = bid.Adid WHERE bid.adid = $paramId";

          $result = mysqli_query($con, $query);
          ?>

          <?php
          if (mysqli_num_rows($result) > 0) {
          ?>
            <table class='table table-bordered table-striped'>

              <tr>
                <td>Source</td>
                <td>Destination</td>
                <td>Bid Price</td>
                <td>Actual Price</td>
                <td>Status</td>
                <td>Action</td>
              </tr>
              <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row["sourc_ad"]; ?></td>
                  <td><?php echo $row["destination"]; ?></td>
                  <td><?php echo $row["bid_price"]; ?></td>
                  <td><?php echo $row["price"]; ?></td>
                  <td><?php
                      if ($row["status"] == '0') : ?>
                      <span class="badge badge-danger"> Not Yet Confirmed</span>
                    <? else : ?>
                      <span class="badge badge-danger"> Confirmed</span>
                    <? endif; ?>
                  </td>
                  <td>
                    <?php
                    if ($row["status"] == '0') : ?>
                      <a href="confirm_bid.php?id=<?php echo $row["bidId"]; ?> 
                      && adId=<?php echo $row["adId"]; ?>" 
                      title='Update Record'>
                      <span class='btn btn-info'>Confirm</span>
                      <? else : ?>
                        <span class="badge badge-success"> Confirmed</span>
                      <? endif; ?>
                      </a>
                  </td>
                </tr>
              <?php
                $i++;
              }
              ?>
            </table>
          <?php
          } else {
            echo "No result found";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>