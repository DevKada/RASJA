<?php
// Database config
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "try";

// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Safe query function
function executeQuery($query) {
    global $conn; // ✅ Make sure $conn is visible inside this function
    return $conn->query($query);
}
?>
