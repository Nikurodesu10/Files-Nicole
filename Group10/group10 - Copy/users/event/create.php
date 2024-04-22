<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $date = $time = "";
$name_err = $date_err = $time_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate date
    $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter a date.";     
    } else{
        $date = $input_date;
    }
    
    // Validate time
    $input_time = trim($_POST["time"]);
    if(empty($input_time)){
        $time_err = "Please enter a time.";     
    } else{
        $time = $input_time;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($date_err) && empty($time_err)){
        // Check if the event already exists
        $sql_check = "SELECT id FROM events WHERE name = ? AND date = ? AND time = ?";
        if($stmt_check = mysqli_prepare($link, $sql_check)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt_check, "sss", $param_name, $param_date, $param_time);
            
            // Set parameters
            $param_name = $name;
            $param_date = $date;
            $param_time = $time;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt_check)){
                mysqli_stmt_store_result($stmt_check);
                
                if(mysqli_stmt_num_rows($stmt_check) == 1){
                    // Event already exists
                    echo "The same event already exists and will not be allowed.";
                } else {
                    // Event does not exist, proceed with insertion
                    $sql_insert = "INSERT INTO events (name, date, time) VALUES (?, ?, ?)";
                    if($stmt_insert = mysqli_prepare($link, $sql_insert)){
                        // Bind variables to the prepared statement as parameters
                        mysqli_stmt_bind_param($stmt_insert, "sss", $param_name, $param_date, $param_time);
                        
                        // Set parameters
                        $param_name = $name;
                        $param_date = $date;
                        $param_time = $time;
                        
                        // Attempt to execute the prepared statement
                        if(mysqli_stmt_execute($stmt_insert)){
                            // Records created successfully. Redirect to landing page
                            header("location: index.php");
                            exit();
                        } else {
                            echo "Oops! Something went wrong. Please try again later.";
                        }
                    }
                    // Close statement
                    mysqli_stmt_close($stmt_insert);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt_check);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Event</title>
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
                    <h2 class="mt-5">Create Event</h2>
                    <p>Please fill this form and submit to add a new Event.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" class="form-control <?php echo (!empty($date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $date; ?>">
                            <span class="invalid-feedback"><?php echo $date_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Time</label>
                            <input type="time" name="time" class="form-control <?php echo (!empty($time_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $time; ?>">
                            <span class="invalid-feedback"><?php echo $time_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>