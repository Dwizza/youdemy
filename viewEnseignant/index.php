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
            include_once '../classes/pdf.php';
            include_once '../classes/video.php';
            $affichagePdf = new pdf();
            $pdfs = $affichagePdf->displayCourses();
            foreach($pdfs as $pdf){
                echo "<div class='bg-white shadow-lg rounded-lg overflow-hidden'>
                <img src='".$pdf['thumbnail']."' alt='Course 4' class='w-full h-48 object-cover'>
                <div class='p-6 flex flex-col gap-2'>
                    <h3 class='text-xl font-bold text-gray-800 mb-2'>".$pdf['title']."</h3>
                    <div class='flex items-center mb-2'>
                        <span class='text-yellow-400'>★★★★★</span>
                        <span class='text-gray-600 ml-2'>4.7 (80,000 students)</span>
                    </div>
                    <a href='detailsCourse.php?course_id=".$pdf['course_id']."&type=".$pdf['type']."' class='justify-self-end text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg'>S'inscrire</a>
                </div>
            </div>";
            }
            $affichageVideo = new Video();
            $videos = $affichageVideo->displayCourses();
            foreach($videos as $video){
                echo "<div class='bg-white shadow-lg rounded-lg overflow-hidden'>
                <img src='".$video['thumbnail']."' alt='Course 4' class='w-full h-48 object-cover'>
                <div class='p-6 flex flex-col gap-2'>
                    <h3 class='text-xl font-bold text-gray-800 mb-2'>".$video['title']."</h3>
                    <div class='flex items-center mb-2'>
                        <span class='text-yellow-400'>★★★★★</span>
                        <span class='text-gray-600 ml-2'>4.7 (80,000 students)</span>
                    </div>
                    <a href='detailsCourse.php?course_id=".$video['course_id']."&type=".$video['type']."' class='justify-self-end text-2xl font-bold text-gray-100 py-2 bg-green-500 text-center rounded-lg transition-all duration-300 ease-in-out hover:text-gray-50 hover:bg-green-600 hover:scale-105 hover:shadow-lg'>S'inscrire</a>
                </div>
            </div>";
            }
            ?>
            
        </div>
    </div>
    <?php
    include_once 'footer.php';
    ?>
