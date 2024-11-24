<?php
include 'includes/db_connection.php';

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$result = $conn->query("
    SELECT students.id, students.name, students.email, students.phone, rooms.room_number 
    FROM students 
    LEFT JOIN rooms ON students.room_id = rooms.id
    WHERE students.name LIKE '%$query%'
");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='hover:bg-gray-50'>
                <td class='border px-3 py-1 text-gray-800'>{$row['id']}</td>
                <td class='border px-3 py-1 text-gray-800'>{$row['name']}</td>
                <td class='border px-3 py-1 text-gray-800'>{$row['email']}</td>
                <td class='border px-3 py-1 text-gray-800'>{$row['phone']}</td>
                <td class='border px-3 py-1 text-gray-800'>" . ($row['room_number'] ? $row['room_number'] : 'Not Assigned') . "</td>
                <td class='border px-3 py-1 text-center'>
                    <a href='edit_student.php?id={$row['id']}' class='bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition'>
                        Edit
                    </a>
                </td>
            </tr>";
    }
} else {
    echo "<tr>
            <td colspan='6' class='text-center text-gray-500 py-4'>No students found.</td>
          </tr>";
}
?>
