<?php include 'includes/header.php'; ?>
<?php include 'includes/db_connection.php'; ?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">Assign Room to Student</h1>
    <form action="process_assign_room.php" method="POST" class="mt-4 space-y-4">
        <!-- Select Student -->
        <div>
            <label for="student" class="block">Select Student</label>
            <select name="student_id" id="student" class="border rounded w-full p-2" required>
                <option value="">-- Select Student --</option>
                <?php
                $students = $conn->query("SELECT id, name FROM students WHERE room_id IS NULL");
                while ($row = $students->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>
        </div>

        <!-- Select Room -->
        <div>
            <label for="room" class="block">Select Room</label>
            <select name="room_id" id="room" class="border rounded w-full p-2" required>
                <option value="">-- Select Room --</option>
                <?php
                $rooms = $conn->query("SELECT id, room_number FROM rooms WHERE capacity > occupied");
                while ($row = $rooms->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>Room {$row['room_number']}</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Assign Room</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
