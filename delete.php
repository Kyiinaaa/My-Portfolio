<?php
// Delete selected photos from the folder and database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_photos'])) {
    // Retrieve the selected photos from the form
    $selectedPhotos = $_POST['selected_photos'];

    // Database connection details
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

    // Delete photos from the folder and database
    foreach ($selectedPhotos as $photo) {
        // Delete photo from the folder
        $photoPath = 'img/' . $photo;
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        // Delete photo record from the database
        $query = "DELETE FROM photo_highlights WHERE filename = '$photo'";
        if ($connection->query($query) !== true) {
            echo 'Error deleting photo: ' . $connection->error;
        }
    }

    
    // Redirect to the homepage
    header("Location: admin.php");
    exit();


    // Close the database connection
    $connection->close();
}

// Display the list of photos to select for deletion
$photoDirectory = 'img/';
$photos = array_diff(scandir($photoDirectory), array('..', '.'));


?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Photos</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(60deg, #020202 0%, #14161a 100%); 
            margin: 0;
        }
        
        h1{
            background: linear-gradient(rgba(10, 10, 10, 0.3), #4e4747);
            padding-bottom: 15px;
            color: #f15d5d;
            text-align: center;
            width: 100%;
        }

        form {
            margin-top: 20px;
            background: linear-gradient(rgba(243, 237, 237, 0.829), #dad3d365);
            margin: 3% 30% 10% 30%;
            padding: 2%;
            border-radius: 5px;
        }

        label {
            display: flex;
         
        }
        
        input[type="submit"] {
            margin-top: 10px;
            padding: 10px 16px 10px 16px;
            background-color: #f59090;
            color: black;
            border: none;
            cursor: pointer;
            font-weight: bold;
        
        }
        
        input[type="submit"]:hover {
            background-color: #f15d5d;
        }
        
        .error-message {
            color: #FF0000;
            margin-top: 10px;
        }
        
        .no-photos {
            color: #777;
        }
    </style>
</head>



</head>
<body>
    <h1>Delete Photos</h1>

    <div class="forms">
    <form method="POST" action="">
        <?php if (!empty($photos)): ?>
            <h2>Select photos to delete:</h2>
            <?php foreach ($photos as $photo): ?>
                <label>
                    <input type="checkbox" name="selected_photos[]" value="<?php echo $photo; ?>">
                    <?php echo $photo; ?>
                </label><br>
            <?php endforeach; ?>
            <br>
            <input type="submit" name="delete_photos" value="Delete Selected Photos">
        <?php else: ?>
            <p>No photos found.</p>
        <?php endif; ?>
    </form>
</body>
</html>
