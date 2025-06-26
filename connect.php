<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "rasja";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);

if (!$conn) {
	die("Connection Failed. " . mysqli_connect_error());
	echo "can't connect to database";
}

function connectDB()
{
	$conn = new mysqli("localhost", "root", "", "rasja");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	return $conn;
}

function executeQuery($query)
{
	$conn = connectDB();
	$result = $conn->query($query);
	$conn->close();
	return $result;
}
