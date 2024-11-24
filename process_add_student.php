<?php
include 'includes/db_connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert into the database
$sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Student added successfully!";
    header("Location: add_student.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
