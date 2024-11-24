<?php include 'includes/header.php'; ?>
<div class="container mx-auto p-4 space-y-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-400 via-blue-500 to-blue-600 p-4 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-bold">Add Room</h1>
        <p class="text-sm mt-1">Add new rooms to the hostel management system with ease.</p>
    </div>

    <!-- Add Room Form -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <form action="process_add_room.php" method="POST" class="space-y-6">
            <!-- Room Number -->
            <div>
                <label for="room_number" class="block text-gray-700 font-medium">Room Number</label>
                <input type="text" id="room_number" name="room_number" placeholder="Enter Room Number" 
                    class="border border-gray-300 rounded w-full p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm" 
                    required>
            </div>
            <!-- Capacity -->
            <div>
                <label for="capacity" class="block text-gray-700 font-medium">Capacity</label>
                <input type="number" id="capacity" name="capacity" placeholder="Enter Capacity" 
                    class="border border-gray-300 rounded w-full p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-sm" 
                    required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
                Add Room
            </button>
        </form>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
