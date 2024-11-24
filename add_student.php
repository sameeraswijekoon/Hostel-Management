<?php include 'includes/header.php'; ?>
<?php include 'includes/db_connection.php'; ?>

<div class="container mx-auto p-6 space-y-8">
    <!-- Header Section with Gradient Background -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 p-6 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-bold">Hostel Management System</h1>
        <p class="text-sm mt-1">Manage your students and room assignments with ease.</p>
    </div>

    <!-- Compact Add Student Form -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-2">Add Student</h2>
        <form action="process_add_student.php" method="POST" class="grid grid-cols-3 gap-2">
            <div>
                <input 
                    type="text" 
                    name="name" 
                    placeholder="Name" 
                    class="border border-gray-300 rounded-lg w-full p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm" 
                    required>
            </div>
            <div>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email" 
                    class="border border-gray-300 rounded-lg w-full p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm" 
                    required>
            </div>
            <div>
                <input 
                    type="text" 
                    name="phone" 
                    placeholder="Phone" 
                    class="border border-gray-300 rounded-lg w-full p-2 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm" 
                    required>
            </div>
            <button type="submit" class="col-span-3 border border-blue-500 text-blue-500 px-4 py-2 rounded-full hover:bg-blue-500 hover:text-white transition">
                Add Student
            </button>
        </form>
    </div>

    <!-- Students List Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Students List</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-gray-600">ID</th>
                    <th class="px-4 py-2 text-left text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left text-gray-600">Email</th>
                    <th class="px-4 py-2 text-left text-gray-600">Phone</th>
                    <th class="px-4 py-2 text-left text-gray-600">Assigned Room</th>
                    <th class="px-4 py-2 text-center text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php
                // Fetch students and their assigned room numbers
                $result = $conn->query("
                    SELECT students.id, students.name, students.email, students.phone, students.room_id, rooms.room_number 
                    FROM students 
                    LEFT JOIN rooms ON students.room_id = rooms.id
                ");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='hover:bg-gray-50'>
                            <td class='px-4 py-2'>{$row['id']}</td>
                            <td class='px-4 py-2'>{$row['name']}</td>
                            <td class='px-4 py-2'>{$row['email']}</td>
                            <td class='px-4 py-2'>{$row['phone']}</td>
                            <td class='px-4 py-2'>" . 
                                ($row['room_number'] ? "Room {$row['room_number']}" : "Not Assigned") . 
                            "</td>
                            <td class='px-4 py-2 text-center'>
                                <form action='process_assign_room.php' method='POST' class='flex items-center space-x-2 justify-center'>
                                    <input type='hidden' name='student_id' value='{$row['id']}'>";
                                    
                    if ($row['room_id']) {
                        echo "<button type='submit' name='action' value='remove' class='border border-red-500 text-red-500 px-3 py-1 rounded-full hover:bg-red-500 hover:text-white transition'>
                                Remove
                              </button>";
                    } else {
                        echo "<select name='room_id' class='border border-gray-300 rounded-lg p-1 focus:ring-2 focus:ring-blue-400 focus:outline-none'>
                                <option value=''>-- Assign Room --</option>";
                        
                        $rooms = $conn->query("SELECT id, room_number, capacity, occupied FROM rooms WHERE capacity > occupied");
                        while ($room = $rooms->fetch_assoc()) {
                            echo "<option value='{$room['id']}'>Room {$room['room_number']} (" . ($room['capacity'] - $room['occupied']) . " available)</option>";
                        }

                        echo "</select>
                              <button type='submit' name='action' value='assign' class='border border-blue-500 text-blue-500 px-3 py-1 rounded-full hover:bg-blue-500 hover:text-white transition'>
                                  Assign
                              </button>";
                    }

                    echo "      </form>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
