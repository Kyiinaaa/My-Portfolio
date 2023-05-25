<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Delete the admin cookie (if it exists)
if (isset($_COOKIE['admin'])) {
    setcookie('admin', '', time() - 3600, '/');
}

// Redirect the user to the home page
header("Location: homepage.php");
exit();
?>
