<?php 
session_start();
// session_destroy();
if($_SESSION){ 
    if($_SESSION['role']=='teacher' && $_SESSION['status']=='active'){
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy - Online Learning Platform</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/78e64kfn4s0xf8q1pja038ftdx4ou3j180izfr0hakyitmql/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialisation de TinyMCE
        tinymce.init({
            selector: '#contenu', // Cible le textarea avec l'ID "description"
            plugins: 'advlist autolink lists link image charmap preview anchor table',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
            menubar: false,
            height: 300,
        });
    </script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
            <a href="index.php">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </a>
        </div>
            <div class="flex items-center space-x-4">
                <a class="hover:text-green-600" href="index.php">Home</a>
                <a class="hover:text-green-600" href="allCourses.php">All courses</a>
                <a class="hover:text-green-600" href="addCourse.php">Add course</a>
                <a class="hover:text-green-600" href="statisticTeacher.php">Statistics</a>
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    <input type="text" placeholder="Search for anything..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 w-full md:w-auto">
                </div>
                <i class="fas fa-shopping-cart text-gray-700 hover:text-green-600 cursor-pointer"></i>
                <i class="fas fa-bell text-gray-700 hover:text-green-600 cursor-pointer"></i>
                <a href="../viewEnseignant/logout.php?id=<?= $_SESSION['userid']?>"><i class="fa-solid fa-right-from-bracket text-gray-700 hover:text-green-600 cursor-pointer"></i></a>
            </div>
        </div>
    </nav>

    <?php }else if($_SESSION['role']=='student'&& $_SESSION['status']=='active'){ ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Youdemy - Online Learning Platform</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <script src="https://cdn.tiny.cloud/1/78e64kfn4s0xf8q1pja038ftdx4ou3j180izfr0hakyitmql/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialisation de TinyMCE
        tinymce.init({
            selector: '#description', // Cible le textarea avec l'ID "description"
            plugins: 'advlist autolink lists link image charmap preview anchor table',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
            menubar: false,
            height: 300,
        });
    </script>
        </head>
        <body class="bg-gray-100">

            <!-- Navbar -->
            <nav class="bg-white shadow-md p-4">
                <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                    <a href="index.php">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </a>
                </div>
                    <div class="flex items-center space-x-5">
                        <a class="hover:text-green-600" href="index.php">Home</a>
                        <a class="hover:text-green-600" href="allCourses.php">All courses</a>
                        <a class="hover:text-green-600" href="">My courses</a>
                        <div class="relative">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            <input type="text" placeholder="Search for anything..." class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-500 w-full md:w-auto">
                        </div>
                        <i class="fas fa-shopping-cart text-gray-700 hover:text-green-600 cursor-pointer"></i>
                        <i class="fas fa-bell text-gray-700 hover:text-green-600 cursor-pointer"></i>
                        <a href="../viewEnseignant/logout.php?id=<?= $_SESSION['userid']?>"><i class="fa-solid fa-right-from-bracket text-gray-700 hover:text-green-600 cursor-pointer"></i></a>
                    </div>
                </div>
            </nav>

    <?php }}else{ ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Youdemy - Online Learning Platform</title>
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
            <script src="https://cdn.tiny.cloud/1/78e64kfn4s0xf8q1pja038ftdx4ou3j180izfr0hakyitmql/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        // Initialisation de TinyMCE
        tinymce.init({
            selector: '#description', // Cible le textarea avec l'ID "description"
            plugins: 'advlist autolink lists link image charmap preview anchor table',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image',
            menubar: false,
            height: 300,
        });
    </script>
        </head>
        <body class="bg-gray-100">

            <!-- Navbar -->
            <nav class="bg-white shadow-md p-4">
                <div class="container mx-auto flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
                    <a href="index.php">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </a>        
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


    <?php }?>
    