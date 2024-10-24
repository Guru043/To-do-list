<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$task = $_POST['task'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'todo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert task into the database
$sql = "INSERT INTO tasks (name) VALUES ('$task')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
