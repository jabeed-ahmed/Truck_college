<?php

require('nav.php');
// Include config file
require_once "../connection.php";
 
// Define variables and initialize with empty values
$status =  "";
$status_err = "";
$status_array = "";
 // Attempt select query execution
 $sql = "SELECT * FROM status";
 if($result = mysqli_query($con, $sql)){
        $status_array = $result;
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_status = $_POST["status"];
    $status = $input_status;
    
    // Check input errors before inserting in database
    // Prepare an update statement
    $sql = "UPDATE user_s SET S_status= '$input_status' WHERE S_id= '$id'";
        
    if ($con->query($sql) === TRUE) {
        header("location: shippers.php");
        exit();
    } else {
        echo "Error updating record: " . $con->error;
    }
    
    $con->close();
    // Close connection
  }
  else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM user_s WHERE S_id = ? ";
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $fName = $row["S_fname"];
                    $lName = $row["S_lname"];
                    $address = $row["S_address"];
                    $status = $row["S_status"];

                    $status_id = $row["S_status"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($con);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($first_name)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="name" readonly class="form-control" value="<?php echo $fName; ?>">
                        </div>
                        <div class="form-group  <?php echo (!empty($last_name)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <textarea name="address" readonly class="form-control"><?php echo $lName; ?></textarea>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <input type="text" name="address"  readonly class="form-control" value="<?php echo $address; ?>">
                        </div>

                        <div class="form-group <?php echo (!empty($status)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <select class="form-control" id="status" name="status">
                                <?php
                                if(!empty($status_array))
                                {
                                    foreach($status_array as $value)
                                    {
                                        if($value['id'] == $status_id)
                                        {
                                            echo "<option selected='selected' value='".$value['id']."'>".$value['name']."</option>";
                                        }
                                        else
                                        {
                                            echo "<option value='".$value['id']."'>".$value['name']."</option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="shippers.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>