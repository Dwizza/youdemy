<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
        </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Search for anything..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 w-full md:w-auto">
                </div>
                <a href="login.php" class="text-gray-700 hover:text-green-600">Login</a>
                <a href="register.php" class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700">Sign Up</a>
                <i class="fas fa-shopping-cart text-gray-700 hover:text-green-600 cursor-pointer"></i>
                <i class="fas fa-bell text-gray-700 hover:text-green-600 cursor-pointer"></i>
                <i class="fas fa-user text-gray-700 hover:text-green-600 cursor-pointer"></i>
            </div>
        </div>
    </nav>