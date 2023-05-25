<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_Tamayo";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the message ID is set and valid for deletion
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $deleteID = $_GET['delete_id'];
    
    // SQL query to delete the message
    $deleteSql = "DELETE FROM contacts WHERE id = $deleteID";

    if ($conn->query($deleteSql) === TRUE) {
        echo "Message deleted successfully.";
    } else {
        echo "Error deleting message: " . $conn->error;
    }
}

// SQL query to retrieve inbox messages
$inboxSql = "SELECT id, name, email, message, created_at FROM contacts ORDER BY created_at DESC";
$result = $conn->query($inboxSql);

// Display inbox messages
?>

<section id="inbox">
    <div class="content">
        <h3>INBOX</h3>
        <p>Here are the received messages:</p>
    </div>

    <div class="inbox-table">
        <?php if ($result->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this message?')">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No messages found.</p>
        <?php } ?>
    </div>

    <div class="back">
        <a href="admin.php" class="back">Back</a>
    </div>

</section>

<?php
// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inbox</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(60deg, #020202 0%, #14161a 100%);
       
        }

        h3{
            font-size: x-large;
        }

        #inbox {
            margin: 35px;
            background: linear-gradient(rgba(243, 237, 237, 0.829), #dad3d365);
            padding: 18px;
   
            
        }

        .content {
            margin-bottom: 15px;
        }

        .inbox-table {
            width: 100%;
        }

        .inbox-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .inbox-table th, .inbox-table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .inbox-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .inbox-table td a {
            color: red;
            text-decoration: none;
            
        }

        .inbox-table td a:hover {
            text-decoration: underline;
        }

        .back {
            margin-top: 20px;
        }

        .back a {
            color: #f2f2f2;
            text-decoration: none;
            background: rgb(46, 45, 45);
            padding: 10px;
        }

        .back a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
