<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'db_Tamayo';

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statements to create tables
$contactsTable = "CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$userTable = "CREATE TABLE user (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

$adminTable = "CREATE TABLE admin (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)";

$photoHighlightsTable = "CREATE TABLE photo_highlights (
    id INT PRIMARY KEY AUTO_INCREMENT,
    filename VARCHAR(255) NOT NULL
)";

$editedTextTable = "CREATE TABLE edited_text (
    id INT PRIMARY KEY AUTO_INCREMENT,
    section_id INT NOT NULL,
    content TEXT NOT NULL
)";

// Execute the SQL queries to create tables
if ($conn->query($contactsTable) === TRUE) {
    echo "Table 'contacts' created successfully.<br>";
} else {
    echo "Error creating table 'contacts': " . $conn->error . "<br>";
}

if ($conn->query($userTable) === TRUE) {
    echo "Table 'user' created successfully.<br>";
} else {
    echo "Error creating table 'user': " . $conn->error . "<br>";
}

if ($conn->query($adminTable) === TRUE) {
    echo "Table 'admin' created successfully.<br>";
} else {
    echo "Error creating table 'admin': " . $conn->error . "<br>";
}

if ($conn->query($photoHighlightsTable) === TRUE) {
    echo "Table 'photo_highlights' created successfully.<br>";
} else {
    echo "Error creating table 'photo_highlights': " . $conn->error . "<br>";
}

if ($conn->query($editedTextTable) === TRUE) {
    echo "Table 'edited_text' created successfully.<br>";
} else {
    echo "Error creating table 'edited_text': " . $conn->error . "<br>";
}

// Close the connection
$conn->close();
?>
