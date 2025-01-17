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

    

    <!-- Courses Grid -->
    <div class="container mx-auto py-8 md:py-12 px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php 
            include_once '../config/database.php';
            include_once '../classes/allCourses.php';
            $affichage = new AllCourses();
            $courses = $affichage->displayCourses();
            foreach($courses as $course){
                echo "<div class='bg-white shadow-lg rounded-lg overflow-hidden'>";
                echo "<img src='".$course['thumbnail']."' alt='Course 4' class='w-full h-48 object-cover'>";
                echo "<div class='p-6 flex flex-col gap-2'>";
                echo "<h3 class='text-xl font-bold text-gray-800 mb-2'>".$course['title']."</h3>";
                echo "<div class='flex items-center mb-2'>";
                echo "<span class='text-yellow-400'>★★★★★</span>";
                echo "<span class='text-gray-600 ml-2'>4.7 (80,000 students)</span>";
                echo "</div>";
                if($_SESSION){
                    echo "<a href='detailsCourse.php?course_id=".$course['course_id']."&type=".$course['type']."' class='justify-self-end text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg'>S'inscrire</a>";
                }else{
                    echo "<a href='login.php' class='justify-self-end text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg'>S'inscrire</a>";
                }
                echo "</div>";
                echo "</div>";
            }
            ?>
            
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
