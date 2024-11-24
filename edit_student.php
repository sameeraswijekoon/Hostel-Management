<?php
include 'includes/header.php';
include 'includes/db_connection.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id = $id");
$student = $result->fetch_assoc();
?>

<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold">Edit Student</h1>
    <form action="process_edit_student.php" method="POST" class="mt-4 space-y-4">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">

        <div>
            <label class="block">Name</label>
            <input type="text" name="name" value="<?php echo $student['name']; ?>" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label class="block">Email</label>
            <input type="email" name="email" value="<?php echo $student['email']; ?>" class="border rounded w-full p-2" required>
        </div>
        <div>
            <label class="block">Phone</label>
            <input type="text" name="phone" value="<?php echo $student['phone']; ?>" class="border rounded w-full p-2" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
