<?php
  // Include config file
  require('session.php');
  require('nav.php');
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ad View - HireTruck</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="icon" href="https://i.ibb.co/tDkQbmq/Logo.png" type="image/x-icon" />
    <style media="screen">
      .box {
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 10px #888888;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-sm bg-primary sticky-top">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link text-white" href="index.php">Back</a>
        </li>
      </ul>
    </nav><br><br>

    <div class="container-fluid">
      <h1>Ads</h1>

        <div class="row">
          <?php
          // Attempt select query execution
          $sql = "SELECT * FROM ad WHERE status='1'";
          if($result = mysqli_query($con, $sql)){
              if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo '<div class="col-sm-4">
                    <div class="card">
                      <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/11/Freightliner_M2_106_6x4_2014_%2814240376744%29.jpg/1200px-Freightliner_M2_106_6x4_2014_%2814240376744%29.jpg" alt="Card image" style="width:100%">
                      <div class="card-body">
                        <h4 class="card-title">'.$row['Source_ad'] .'</h4>
                        <p class="card-text">'.$row['destination'] .'</p>
                        <a href="#" class="btn btn-primary">See Details</a>
                      </div>
                    </div>
                    </div>';
              }
              mysqli_free_result($result);
              } else{
                  echo "<p class='lead'><em>No records were found.</em></p>";
              }
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
          }
          ?>
        </div>
    </div>

  </body>
</html>