<?php

// Assuming you have a database connection established
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_Tamayo";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['editedText'])) {
    // Retrieve the edited text from the AJAX request
    $editedText = $_POST['editedText'];

    // Perform necessary sanitization/validation on the edited text
    $editedText = $conn->real_escape_string($editedText); // Escape special characters to prevent SQL injection

    // Update the specific section's content with the edited text
    $sql = "UPDATE edited_texts SET content = '$editedText' WHERE section_id = 'details'";

    if ($conn->query($sql) === TRUE) {
        // Return the updated text to the client-side for display
        echo $editedText;
    } else {
        // Handle the error case
        echo "Error updating section: " . $conn->error;
    }
} else {
    echo "Error: 'editedText' key is not present in the request.";
}

$conn->close();

?>