<?php include 'includes/header.php'; ?>
<?php include 'includes/db_connection.php'; ?>

<div class="container mx-auto p-4 space-y-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 p-4 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-bold">Check Room Availability</h1>
        <p class="text-sm mt-1">View the availability of rooms in real-time.</p>
    </div>

    <!-- Room Availability Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <table class="table-auto w-full border-collapse border border-gray-200 text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="border px-4 py-2 text-left">Room Number</th>
                    <th class="border px-4 py-2 text-left">Capacity</th>
                    <th class="border px-4 py-2 text-left">Occupied</th>
                    <th class="border px-4 py-2 text-left">Available Slots</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700">
                <?php
                $result = $conn->query("SELECT room_number, capacity, occupied, capacity - occupied AS available FROM rooms");
                while ($row = $result->fetch_assoc()) {
                    $availableSlots = $row['available'] > 0 ? $row['available'] : '<span class="text-red-500 font-semibold">Full</span>';
                    echo "<tr class='hover:bg-gray-50'>
                            <td class='border px-4 py-2'>{$row['room_number']}</td>
                            <td class='border px-4 py-2'>{$row['capacity']}</td>
                            <td class='border px-4 py-2'>{$row['occupied']}</td>
                            <td class='border px-4 py-2'>{$availableSlots}</td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
