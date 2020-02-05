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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });
</script>
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
    <div class="row">
        <div class="col-md-12">
        <br/>
            <div class="page-header clearfix">
                <h2 class="pull-left">Shipper Details</h2>
                <br/>
            </div>
            <?php
            // Include config file
            require_once "../connection.php";
            
            // Attempt select query execution
            $sql = "SELECT * FROM user_s";
            if($result = mysqli_query($con, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th scope='col'>#</th>";
                                echo "<th scope='col'>First Name</th>";
                                echo "<th scope='col'>Last Name</th>";
                                echo "<th scope='col'>Address</th>";
                                echo "<th scope='col'>Status</th>";
                                echo "<th scope='col'>Action</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while($row = mysqli_fetch_array($result)){
                            $status = $row['S_status'];
                            if($status == 1) {
                                $status = 'active';
                            } else {
                                $status = 'inactive';
                            }
                            echo "<tr>";
                                echo "<td>" . $row['S_id'] . "</td>";
                                echo "<td>" . $row['S_fname'] . "</td>";
                                echo "<td>" . $row['S_lname'] . "</td>";
                                echo "<td>" . $row['S_address'] . "</td>";
                                echo "<td>" . $status . "</td>";
                                echo "<td>";
                                    echo "<a href='update.php?id=". $row['S_id'] ."' title='Update'
                                    data-toggle='tooltip'><Button class='btn btn-info'>Update</Button></a>";
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
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
            }

            // Close connection
            mysqli_close($con);
            ?>
        </div>
    </div>  
  </div>
</body>

</html>