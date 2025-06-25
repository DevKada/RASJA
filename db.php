<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "jobCircle";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

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
