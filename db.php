<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "jobCircle";

// Enable detailed MySQLi error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Reusable query function (supports prepared statements)
function executeQuery($query, $params = [])
{
  global $conn;

  $stmt = $conn->prepare($query);
  if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
  }

  if (!empty($params)) {
    $types = str_repeat("s", count($params));
    $stmt->bind_param($types, ...$params);
  }

  $stmt->execute();
  return $stmt->get_result();
}
?>
