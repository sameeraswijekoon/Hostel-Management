<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<header>
    <nav class="bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800 shadow-md">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <!-- Logo -->
            <a href="index.php" class="flex items-center">
                <img src="img/logo.png" class="mr-3 h-6 sm:h-9" alt="Hostel Management Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Hostel Management</span>
            </a>

          

            <!-- Navigation Links -->
            <div class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu">
                <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                    <li>
                        <a href="index.php" class="block py-2 pr-4 pl-3 text-white rounded bg-blue-600 lg:bg-transparent lg:text-blue-600 lg:p-0 dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="add_student.php" class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">Add Student</a>
                    </li>
                    <li>
                        <a href="view_students.php" class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">View Students</a>
                    </li>
                    <li>
                        <a href="add_rooms.php" class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">Add Rooms</a>
                    </li>
                    <li>
                        <a href="check_rooms.php" class="block py-2 pr-4 pl-3 text-gray-700 hover:bg-gray-50 lg:hover:bg-transparent lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent">Check Rooms</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    // Toggle Mobile Menu
    const toggleButton = document.querySelector('[data-collapse-toggle="mobile-menu"]');
    const mobileMenu = document.getElementById('mobile-menu');
    
    toggleButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>

</body>
</html>
