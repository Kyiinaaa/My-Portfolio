<?php
// Retrieve form inputs
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Validate and sanitize inputs (you can add more validation as per your requirements)

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_Tamayo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
$sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: portfolio.php");
exit;
} else {
    header("Location: portfolio.php");
exit;
}

// Close the database connection
$conn->close();
?>
