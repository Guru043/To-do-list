<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_POST['id'];

// Create connection
$conn = new mysqli('localhost', 'root', '', 'todo_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete task from the database
$sql = "DELETE FROM tasks WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close connection
$conn->close();
?>
