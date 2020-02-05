<?php
require('session.php');
require('nav.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container">
    <?php
    if ($_SESSION['user_type'] == "Police") {
      include('police.php');
      echo $_SESSION['user_type'];
    }
    ?>
  </div>

  <!-- DESIGN -->
  <div class="container-fluid" style="width: 1200px;">
  <br/>
    <h1>Admin Panel</h1>
    <p><strong>Note:</strong> Check the details of Shipper and Carriers.</p>
    <div class="row">
      <div class="col" style="background-color:lavender;">Shipper</div>
      <div class="col" style="background-color:orange;">Carrier</div>
      <div class="col" style="background-color:lavender;">Total Users</div>
    </div>
  </div>
</body>

</html>