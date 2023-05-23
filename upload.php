<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $targetDirectory = 'img/';
    $uploadFile = $_FILES['photo']['tmp_name'];
    $filename = $_FILES['photo']['name'];
    $targetFile = $targetDirectory . basename($filename);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($uploadFile);
    if ($check === false) {
        echo 'Error: Invalid image file.';
        $uploadOk = false;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo 'Error: File already exists.';
        $uploadOk = false;
    }

    // Check file size
    if ($_FILES['photo']['size'] > 500000) {
        echo 'Error: File size exceeds the maximum limit.';
        $uploadOk = false;
    }

    // Allow only specific file formats (you can customize this as per your needs)
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedFormats)) {
        echo 'Error: Only JPG, JPEG, PNG, and GIF files are allowed.';
        $uploadOk = false;
    }

    // If all checks pass, move the file to the target directory

if ($uploadOk) {
    if (move_uploaded_file($uploadFile, $targetFile)) {
        // File uploaded successfully, now store the information in the database
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'db_Tamayo';

        // Create a connection to the database
    $connection = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($connection->connect_errno) {
    // Display the connection error message
    echo 'Failed to connect to the database: ' . $connection->connect_error;
    // You can also log the error for troubleshooting purposes
    // error_log('Failed to connect to the database: ' . $connection->connect_error);
    exit;
}

    // Insert the uploaded photo details into the database
    $query = "INSERT INTO photo_highlights (filename) VALUES ('$filename')";


        // Execute the SQL statement
        if ($connection->query($query) === true) {
            header("Location: admin.php");
            exit();
        } else {
            echo 'Error: Unable to store file information in the database.'. $connection->error;
        
        }
    }    
        // Retrieve the photo details from the database
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'db_Tamayo';
        
        // Create a connection to the database
        $connection = new mysqli($servername, $username, $password, $dbname);
        
        // Check if the connection was successful
        if ($connection->connect_errno) {
            // Display the connection error message
            echo 'Failed to connect to the database: ' . $connection->connect_error;
            // You can also log the error for troubleshooting purposes
            // error_log('Failed to connect to the database: ' . $connection->connect_error);
            exit;
        }
        
        // Select the filenames from the photo_highlights table
        $query = "SELECT filename FROM photo_highlights";
        $result = $connection->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $filename = $row['filename'];
                $imagePath = 'img/' . $filename;
                echo '<img src="' . $imagePath . '" alt="Photo">';
            }
        } else {
            echo 'No photos found.';
        }
        
        // Close the database connection
        $conn->close();
    } else {
        echo 'Error: There was an error uploading the file.';
    }
}

?>
