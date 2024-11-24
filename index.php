<?php include 'includes/header.php'; ?>
<?php include 'includes/db_connection.php'; ?>

<div class="container mx-auto p-4 space-y-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 p-6 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-bold">Dashboard</h1>
        <p class="text-sm mt-1">Get a quick overview of your hostel management system.</p>
    </div>

    <!-- Statistics Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php
        // Fetch data from the database
        $totalStudents = $conn->query("SELECT COUNT(*) AS count FROM students")->fetch_assoc()['count'];
        $availableRooms = $conn->query("SELECT COUNT(*) AS count FROM rooms WHERE occupied < capacity")->fetch_assoc()['count'];
        $totalRooms = $conn->query("SELECT COUNT(*) AS count FROM rooms")->fetch_assoc()['count'];
        $occupiedRooms = $conn->query("SELECT COUNT(*) AS count FROM rooms WHERE occupied > 0")->fetch_assoc()['count'];
        ?>

        <!-- Total Students Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-4 bg-blue-500 rounded-full text-white">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16 11c1.308 0 2.406-.835 2.816-2h1.184v-2h-1.184c-.41-1.165-1.508-2-2.816-2-1.308 0-2.406.835-2.816 2h-5.368c-.41-1.165-1.508-2-2.816-2-1.308 0-2.406.835-2.816 2h-1.184v2h1.184c.41 1.165 1.508 2 2.816 2 1.308 0 2.406-.835 2.816-2h5.368c.41 1.165 1.508 2 2.816 2z"></path>
                        <path d="M20 14h-1v-2h-2v2h-2v-2h-2v2h-2v-2h-2v2h-1c-1.103 0-2 .897-2 2v6h14v-6c0-1.103-.897-2-2-2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-700">Total Students</h2>
                    <p class="text-3xl font-bold text-gray-800"><?php echo $totalStudents; ?></p>
                </div>
            </div>
        </div>

        <!-- Available Rooms Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-4 bg-green-500 rounded-full text-white">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17 2h-10c-1.103 0-2 .897-2 2v16l7-3 7 3v-16c0-1.103-.897-2-2-2z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-700">Available Rooms</h2>
                    <p class="text-3xl font-bold text-gray-800"><?php echo $availableRooms; ?></p>
                </div>
            </div>
        </div>

        <!-- Total Rooms Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-4 bg-purple-500 rounded-full text-white">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 22h18v-2h-18v2zm1-4h16v-13h-16v13zm8-7h6v5h-6v-5zm-7 5v-5h6v5h-6z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-700">Total Rooms</h2>
                    <p class="text-3xl font-bold text-gray-800"><?php echo $totalRooms; ?></p>
                </div>
            </div>
        </div>

        <!-- Occupied Rooms Card -->
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
            <div class="flex items-center">
                <div class="p-4 bg-red-500 rounded-full text-white">
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20 4h-16c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-12c0-1.103-.897-2-2-2zm-1 10h-14v-8h14v8z"></path>
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-xl font-semibold text-gray-700">Occupied Rooms</h2>
                    <p class="text-3xl font-bold text-gray-800"><?php echo $occupiedRooms; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
