<?php
include 'includes/db_connection.php';

$student_id = $_POST['student_id'];
$action = $_POST['action'];

if ($action === 'assign') {
    $room_id = $_POST['room_id'];

    // Assign room to student
    $conn->query("UPDATE students SET room_id = $room_id WHERE id = $student_id");

    // Increment room occupancy
    $conn->query("UPDATE rooms SET occupied = occupied + 1 WHERE id = $room_id");

} elseif ($action === 'remove') {
    // Get the current room assigned to the student
    $current_room = $conn->query("SELECT room_id FROM students WHERE id = $student_id")->fetch_assoc()['room_id'];

    // Remove room assignment from student
    $conn->query("UPDATE students SET room_id = NULL WHERE id = $student_id");

    // Decrement room occupancy
    if ($current_room) {
        $conn->query("UPDATE rooms SET occupied = occupied - 1 WHERE id = $current_room");
    }
}

// Redirect back to the students list
header("Location: add_student.php");
?>
