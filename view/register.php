<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Youdemy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
        </div>
            <div class="flex items-center space-x-4">
                <a href="index.php" class="text-gray-700 hover:text-green-600">Home</a>
                <a href="login.php" class="text-gray-700 hover:text-green-600">Login</a>
            </div>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Create an Account</h2>
            <form method="POST">
                <!-- Full Name -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 mb-2">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter your full name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                
                <!-- Password -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" name="pass" id="password" placeholder="Enter your password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <!-- Role Selection -->
                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">You are:</label>
                    <div class="flex items-center space-x-6">
                        <label class="flex items-center">
                            <input type="radio" name="role" value="student" class="form-radio h-5 w-5 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-gray-700">Student</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="role" value="teacher" class="form-radio h-5 w-5 text-green-600 focus:ring-green-500">
                            <span class="ml-2 text-gray-700">Teacher</span>
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Sign Up</button>

                <!-- Login Link -->
                <p class="text-center text-gray-600 mt-4">
                    Already have an account? <a href="login.php" class="text-green-600 hover:underline">Login</a>
                </p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js"></script>

</body>
</html>
<?php
include_once '../config/database.php';
include_once '../classes/User.php';
include_once '../classes/userRepo.php';
try {
    if(isset($_POST['submit'])){
            if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['role'])){
                echo "<script>Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'fill all fields',
                            showConfirmButton: false,
                            timer: 1500
                        });</script>";
                return;
            }else{
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $role = $_POST['role'];
            }
            $addUser = new UserRepo();
            $student = new user($name, $email, $password, $role, 'active');
            $addUser->register($student);
            echo "<script>Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Registration Successful',
                    showConfirmButton: false,
                    timer: 1500
                });</script>";
    }

}catch (PDOException) {
    echo "<script>Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'this email is already registered',
                            showConfirmButton: false,
                            timer: 1500
                        });</script>";
}

?>