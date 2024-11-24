<?php
include 'includes/db_connection.php';

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$result = $conn->query("
    SELECT name FROM students 
    WHERE name LIKE '%$query%' 
    LIMIT 10
");

$names = [];
while ($row = $result->fetch_assoc()) {
    $names[] = $row['name'];
}

echo json_encode($names);
?>
