<?php
include_once 'header.php';
?>
<!-- Hero Section -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 py-12 md:py-20">
        <div class="container mx-auto text-center text-white px-4">
            <?php if($_SESSION){ ?>
            <h1 class="text-3xl md:text-5xl font-bold mb-4">Welcome <?= $_SESSION['userName']?></h1>
            <?php }else{?>
            <p class="text-3xl md:text-5xl font-bold mb-4">Start learning with us today.</p>
            <?php }?>
            <p class="text-lg md:text-xl mb-8">Skills for your present (and future). Get started with us.</p>
            <a href="allCourses.php" class="bg-white text-green-600 px-6 py-3 mt-4 rounded-lg font-semibold hover:bg-gray-100">Explore now</a>
        </div>
    </div>

    <!-- Categories -->
    <div class="container mx-auto py-8 md:py-12 px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">A broad selection of courses</h2>
        <div class="flex flex-wrap gap-2 md:gap-4">
            <?php 
            include_once '../classes/category.php';
            $categorie = new category();
            $categories = $categorie->displayCategories();
            foreach($categories as $category){
                echo "<button class='bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base'>".$category['name']."</button>";
            }
            ?>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="container mx-auto py-8 md:py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://www.twistedbrackets.com/content/images/size/w1200/2022/12/html.png" alt="Course 1" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col justify-between gap-2">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Web Development</h3>
                    <p class="text-gray-600 mb-2">John Smith</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.8 (150,000 students)</span>
                    </div>
                    <a href="#" class="text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg">S'inscrire</a>
                </div>
            </div>
            <!-- Course Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="data:image/jpeg;base64,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" alt="Course 2" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col justify-between gap-2">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Python for Beginners</h3>
                    <p class="text-gray-600 mb-2">Jane Doe</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.6 (120,000 students)</span>
                    </div>
                    <a href="#" class="text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg">S'inscrire</a>
                </div>
            </div>
            <!-- Course Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://exbsoft.com/Content/Images/Technologies/js.jpg" alt="Course 3" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col justify-between gap-2">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Machine Learning A-Z</h3>
                    <p class="text-gray-600 mb-2">Alex Johnson</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.9 (200,000 students)</span>
                    </div>
                    <a href="#" class="text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg">S'inscrire</a>
                </div>
            </div>
            <!-- Course Card 4 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://upload.wikimedia.org/wikipedia/commons/c/c1/PHP_Logo.png" alt="Course 4" class="w-full h-48 object-cover">
                <div class="p-6 flex flex-col gap-2">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Marketing Masterclass</h3>
                    <p class="text-gray-600 mb-2">Sarah Wilson</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.7 (80,000 students)</span>
                    </div>
                    <a href="#" class="justify-self-end text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg">S'inscrire</a>
                </div>
            </div>
            <video src="https://www.youtube.com/watch?v=mEz_Rh4tot8&t=14s" class="w-72 h-20"></video>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
