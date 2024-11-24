<?php
include 'includes/db_connection.php';

$room_number = $_POST['room_number'];
$capacity = $_POST['capacity'];

// Insert into the database
$sql = "INSERT INTO rooms (room_number, capacity) VALUES ('$room_number', '$capacity')";

if ($conn->query($sql) === TRUE) {
    echo "Room added successfully!";
    header("Location: check_rooms.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
