<?php
$targetDir = "uploads/"; // Directory where uploaded photos will be stored

// Check if the form is submitted for image removal
if(isset($_POST["submit_remove"])) {
    // Database Connection (adjust credentials as needed)
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "db_homepage"; // Replace with your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Loop through each selected image for removal
    if(isset($_POST["remove"])) {
        foreach($_POST["remove"] as $imageName) {
            // Remove file from server directory
            $targetFile = $targetDir . $imageName;
            if (file_exists($targetFile)) {
                unlink($targetFile);
                echo "File '$imageName' has been removed from server.<br>";
            } else {
                echo "File '$imageName' does not exist on server.<br>";
            }

            // Remove file entry from database
            $sql = "DELETE FROM images WHERE filename='$imageName'";
            if ($conn->query($sql) === TRUE) {
                echo "Record for file '$imageName' deleted from database.<br>";
            } else {
                echo "Error deleting record for file '$imageName' from database: " . $conn->error . "<br>";
            }
        }
    } else {
        echo "No images selected for removal.";
    }

    $conn->close();
}

// Check if the form is submitted for image upload
if(isset($_POST["submit_upload"])) {
    $uploadOk = 1;
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if ($_FILES["fileToUpload"]["error"] !== UPLOAD_ERR_OK) {
        echo "File upload failed.";
        exit;
    }

    // Check if the uploaded file is an image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Create the uploads directory if it doesn't exist
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true); // Create directory recursively with full permissions
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, a file with the same name already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowedExtensions = array("jpg", "jpeg", "png", "gif", "jfif");
    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, and JFIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "The file " . $fileName . " has been uploaded.";
            // Redirect to view.php
            header("Location: view.php?image=" . urlencode($fileName));
            exit;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
