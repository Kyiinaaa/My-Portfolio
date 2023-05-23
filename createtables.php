<?php
// Database connection settings
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_Tamayo';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create the table
$sql = 'CREATE TABLE contacts (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)';
if ($conn->query($sql) === TRUE) {
    echo 'Table created successfully!';
} else {
    echo 'Error creating table: ' . $conn->error;
}

// Close the database connection
$conn->close();
?>