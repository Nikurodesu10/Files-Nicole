<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM events WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $date = $row["date"];
                $time = $row["time"]; // Add time to retrieve from database
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
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
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Name</label>
                        <p><b><?php echo $row["name"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <p><b><?php echo $row["date"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Time</label> <!-- New section for time -->
                        <p><b><?php echo $row["time"]; ?></b></p>
                    </div>
                      <!-- Display total number of volunteers -->
                      <?php
                    // Include config file
                    require_once "volunteer/configV.php";
    
                    // Calculate total number of volunteers
                    $total_volunteers_sql = "SELECT COUNT(*) AS total FROM volunteers";
                    $total_volunteers_result = mysqli_query($link, $total_volunteers_sql);
                    $total_volunteers_row = mysqli_fetch_assoc($total_volunteers_result);
                    $total_volunteers = $total_volunteers_row['total'];
                    mysqli_free_result($total_volunteers_result);
                    mysqli_close($link);
                    ?>
                    <div>Total Volunteers: <?php echo $total_volunteers; ?></div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                    <!-- Link to volunteer.php -->
                    <p><a href="volunteer/createV.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Volunteer</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
