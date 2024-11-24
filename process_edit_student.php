<?php
include 'includes/db_connection.php';

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Update student details in the database
$sql = "UPDATE students SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: view_students.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>
