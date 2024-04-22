<?php
// Database Connection (adjust credentials as needed)
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "db_homepage"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all image filenames from database
$sql = "SELECT filename FROM images";
$result = $conn->query($sql);


if(isset($_GET['image'])) {
    $uploadedImage = $_GET['image'];
    echo "<p>Image '$uploadedImage' successfully uploaded.</p>";
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  </style>
</head>
<body>


<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
  </ul>
  
  <!-- The slideshow -->


    <div class="carousel-inner">
    <?php
    if ($result->num_rows > 0) 
    {
           $count = 0;
            // Output each image with a checkbox
            while($row = $result->fetch_assoc()) 
            {
                if($count==0)
                {
                    $active = 'active';
                }
                else
                {
                    $active = '';
                }
                $imageName = $row["filename"];
                ?>
                <div class="carousel-item  <?php echo  $active;?>">
                    <img src="<?php echo $imageName;   ?>"   width="1100" height="500">
                </div>
                <?php
                $count++;
            } 
        } 
        else 
        {
        echo "No images found.";
        }
    ?>
    </div>
   

     <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="mang.jpg" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="rove.jpg" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="help.jpg" alt="New York" width="1100" height="500">
    </div>
  </div> 
    Left and right controls 
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>

</body>
</html>


