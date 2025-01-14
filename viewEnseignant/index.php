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
            <button class="bg-white text-green-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100">Explore now</button>
        </div>
    </div>

    <!-- Categories -->
    <div class="container mx-auto py-8 md:py-12 px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">A broad selection of courses</h2>
        <div class="flex flex-wrap gap-2 md:gap-4">
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">Python</button>
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">Excel</button>
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">Web Development</button>
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">JavaScript</button>
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">Data Science</button>
            <button class="bg-white text-gray-700 px-4 py-2 rounded-full border border-gray-300 hover:bg-green-600 hover:text-white text-sm md:text-base">AWS</button>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="container mx-auto py-8 md:py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Course Card 1 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300x200" alt="Course 1" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Complete Web Development 2024</h3>
                    <p class="text-gray-600 mb-2">John Smith</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.8 (150,000 students)</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">$89.99</p>
                </div>
            </div>
            <!-- Course Card 2 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300x200" alt="Course 2" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Python for Beginners</h3>
                    <p class="text-gray-600 mb-2">Jane Doe</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.6 (120,000 students)</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">$79.99</p>
                </div>
            </div>
            <!-- Course Card 3 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300x200" alt="Course 3" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Machine Learning A-Z</h3>
                    <p class="text-gray-600 mb-2">Alex Johnson</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.9 (200,000 students)</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">$94.99</p>
                </div>
            </div>
            <!-- Course Card 4 -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <img src="https://via.placeholder.com/300x200" alt="Course 4" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">Digital Marketing Masterclass</h3>
                    <p class="text-gray-600 mb-2">Sarah Wilson</p>
                    <div class="flex items-center mb-2">
                        <span class="text-yellow-400">★★★★★</span>
                        <span class="text-gray-600 ml-2">4.7 (80,000 students)</span>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">$84.99</p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
