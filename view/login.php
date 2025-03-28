<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Youdemy</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center">
            <a href="index.php">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </a>
        </div>
            <div class="flex items-center space-x-4">
                <a href="index.php" class="text-gray-700 hover:text-green-600">Home</a>
                <a href="register.php" class="text-gray-700 hover:text-green-600">Sign Up</a>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container mx-auto py-12 px-4">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg p-8">
        <?php
        session_start();
            include_once '../classes/userRepo.php';
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $password = $_POST['pass'];
                $login = new UserRepo();
                $login->login($email,$password);
            }
        ?>
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Login to Youdemy</h2>
            <form method="POST">
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-2">Password</label>
                    <input type="password" name="pass" id="password" placeholder="Enter your password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <button type="submit" name="login" class="w-full bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700">Login</button>
                <p class="text-center text-gray-600 mt-4">
                    Don't have an account? <a href="register.php" class="text-green-600 hover:underline">Sign Up</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>
<script>
const email = document.getElementById('email');
const password = document.getElementById('password');
email.classList.add('border-red-500 animate-pulse');

</script>

