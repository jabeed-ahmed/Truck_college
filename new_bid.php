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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    <div class="container-fluid" style="width: 1200px;">
      <div class="row">
          <div class="col-md-12">
          <br/>
              <div class="page-header clearfix">
                  <h2 class="pull-left">Show Bids</h2>
                  <br/>
              </div>
              <?php
              // Include config file
              require('Session.php');

              require_once "connection.php";
              
              // Attempt select query execution
              $paramId = htmlspecialchars($_GET["id"]);
              $query = "SELECT bid.bidId, ad.AD_id as adId, ad.Source_ad as sourc_ad, bid.bid_price, ad.price, 
              bid.status, ad.destination FROM `bid_items` bid 
              Inner JOIN ad 
              on ad.AD_id = bid.Adid WHERE bid.adid = $paramId";
    
              if($result = mysqli_query($con, $query)){
                  if(mysqli_num_rows($result) > 0){
                      echo "<table class='table'>";
                          echo "<thead>";
                              echo "<tr>";
                                  echo "<th scope='col'>Source</th>";
                                  echo "<th scope='col'>Destination</th>";
                                  echo "<th scope='col'>Bid Price</th>";
                                  echo "<th scope='col'>Actual Price</th>";
                                  echo "<th scope='col'>Status</th>";
                                  echo "<th scope='col'>Action</th>";
                              echo "</tr>";
                          echo "</thead>";
                          echo "<tbody>";
                          while($row = mysqli_fetch_array($result)){
                              $status = $row['status'];
                              if($status == 1) {
                                  $status = 'Confirmed';
                                  $color = 'btn btn-success';
                              } else {
                                  $status = 'Deactivate';
                                  $color = 'btn btn-danger';
                              }
                              echo "<tr>";
                                  echo "<td>" . $row['sourc_ad'] . "</td>";
                                  echo "<td>" . $row['destination'] . "</td>";
                                  echo "<td>" . $row['bid_price'] . "</td>";
                                  echo "<td>" . $row['price'] . "</td>";
                                  echo "<td>";  
                                  if($status== 0) {
                                    ?>
                                     <span class="badge badge-danger"> Not Yet Confirmed</span>
                                     <?php
                                   } else {
                                    ?>
                                    <span class="badge badge-success"> Confirmed</span>
                                    <?php
                                   };
                                  echo "</td>";

                                  echo "<td>";  
                                  if($status== 0) {
                                    ?>
                                    
                                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                         Confirm & Pay
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirm & Pay</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                              Do you really want to confirm the bid?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="confirm_bid.php?id=<?php echo $row["bidId"]; ?> 
                                                  && adId=<?php echo $row["adId"]; ?>" 
                                                  title='Update Record'>
                                                  <span class='btn btn-primary'>Confirm & Pay</span>
                                              </a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                     <?php
                                   } else {
                                    ?>
                                    <span class="badge badge-success"> Confirmed</span>
                                    <?php
                                   };
                                  echo "</td>";
                              echo "</tr>";
                          }
                          echo "</tbody>";                            
                      echo "</table>";
                      // Free result set
                      mysqli_free_result($result);
                  } else{
                      echo "<p class='lead'><em>No records were found.</em></p>";
                  }
              } else{
                  echo "ERROR: Could not able to execute $query. " . mysqli_error($con);
              }

              // Close connection
              mysqli_close($con);
              ?>

              <!-- Trigger the modal with a button -->
<!-- Button trigger modal -->

          </div>
      </div>  
    </div>
  </div>
</body>

</html>