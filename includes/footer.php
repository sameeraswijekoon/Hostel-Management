<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        footer {
            background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
            color: #ffffff;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body class="bg-gray-100">

    <!-- Content Area -->
    <main class="container mx-auto px-4 py-6">
        
        <p class="text-gray-600 text-center">Manage your students and rooms effortlessly with our modern system.</p>
    </main>

    <!-- Compact Footer -->
    <footer class="p-4 text-sm text-center">
        <p class="font-semibold">
            Hostel Management System &copy; <?php echo date('Y'); ?>
        </p>
        <div class="mt-2 space-x-4">
            <a href="#" class="text-gray-300 hover:text-white transition">Privacy Policy</a>
            <a href="#" class="text-gray-300 hover:text-white transition">Terms of Service</a>
            <a href="#" class="text-gray-300 hover:text-white transition">Contact Us</a>
        </div>
    </footer>

</body>
</html>
