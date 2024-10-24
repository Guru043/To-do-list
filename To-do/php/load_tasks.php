<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create connection
$conn = new mysqli('localhost', 'root', '', 'todo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

$tasks = array();

// Loop through all records and add to $tasks array
while($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

// Return tasks as JSON
echo json_encode($tasks);

// Close connection
$conn->close();
?>
