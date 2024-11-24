<?php include 'includes/header.php'; ?>
<?php include 'includes/db_connection.php'; ?>

<div class="container mx-auto p-4 space-y-6">
    <!-- Header Section with Gradient Background -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 p-4 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-bold">Hostel Management System</h1>
        <p class="text-sm mt-1">Search and manage students effortlessly.</p>
    </div>

    <!-- Search Box with Auto-Suggest -->
    <div class="flex justify-between items-center mb-4">
        <div class="relative w-full md:w-1/2">
            <input type="text" id="search" placeholder="Search by student name" 
                class="w-full p-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm" />
            <div id="suggestions" class="absolute z-10 bg-white border border-gray-300 rounded shadow-md w-full hidden max-h-48 overflow-auto">
                <!-- Suggestions will be dynamically populated -->
            </div>
        </div>
        <a href="add_student.php" class="bg-green-600 text-white px-4 py-2 ml-4 rounded hover:bg-green-700 transition">
            Add Student
        </a>
    </div>

    <!-- Students Table Section -->
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Students List</h2>
        <table class="table-auto w-full border-collapse border border-gray-200 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-3 py-2 text-left">ID</th>
                    <th class="border px-3 py-2 text-left">Name</th>
                    <th class="border px-3 py-2 text-left">Email</th>
                    <th class="border px-3 py-2 text-left">Phone</th>
                    <th class="border px-3 py-2 text-left">Assigned Room</th>
                    <th class="border px-3 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody id="student-table" class="divide-y divide-gray-100">
                <?php
                // Fetch all students by default
                $result = $conn->query("
                    SELECT students.id, students.name, students.email, students.phone, rooms.room_number 
                    FROM students 
                    LEFT JOIN rooms ON students.room_id = rooms.id
                ");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='hover:bg-gray-50'>
                            <td class='border px-3 py-2 text-gray-800'>{$row['id']}</td>
                            <td class='border px-3 py-2'>{$row['name']}</td>
                            <td class='border px-3 py-2'>{$row['email']}</td>
                            <td class='border px-3 py-2'>{$row['phone']}</td>
                            <td class='border px-3 py-2 text-center'>" . 
                                ($row['room_number'] ? "Room {$row['room_number']}" : 'Not Assigned') . 
                            "</td>
                            <td class='border px-3 py-2 text-center'>
                                <a href='edit_student.php?id={$row['id']}' class='bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition'>
                                    Edit
                                </a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    const searchInput = document.getElementById('search');
    const suggestionsBox = document.getElementById('suggestions');
    const studentTable = document.getElementById('student-table');

    // Fetch student names for auto-suggest
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.trim();

        if (query === '') {
            suggestionsBox.innerHTML = '';
            suggestionsBox.classList.add('hidden');
            return;
        }

        fetch(`fetch_student_names.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    suggestionsBox.innerHTML = data.map(name => 
                        `<div class="px-4 py-2 hover:bg-gray-200 cursor-pointer">${name}</div>`
                    ).join('');
                    suggestionsBox.classList.remove('hidden');

                    // Add click event to suggestions
                    suggestionsBox.querySelectorAll('div').forEach(item => {
                        item.addEventListener('click', () => {
                            searchInput.value = item.textContent;
                            suggestionsBox.classList.add('hidden');
                            filterStudents(item.textContent);
                        });
                    });
                } else {
                    suggestionsBox.innerHTML = '<div class="px-4 py-2 text-gray-500">No matches found</div>';
                }
            });
    });

    // Filter students dynamically
    function filterStudents(query) {
        fetch(`fetch_students.php?query=${query}`)
            .then(response => response.text())
            .then(html => {
                studentTable.innerHTML = html;
            });
    }
</script>

<?php include 'includes/footer.php'; ?>
