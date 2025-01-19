<?php include_once 'header.php';
include_once '../classes/studentCourses.php';
?>
    <div class="container  mx-auto py-8 md:py-12 px-4">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6 text-center">Your Courses</h2>
    </div>
    
<div class="flex gap-3 flex-wrap">
    <!-- Courses -->
    <?php 
        $studentCourses = new StudentCourses();
        $courses = $studentCourses->StudentCourses();
        foreach($courses as $course){
    ?>
    <div class="bg-white w-96 rounded-lg border border-gray-200 shadow-sm overflow-hidden flex">
        <!-- Image du cours -->
        <img src="<?= $course['thumbnail']?>" alt="Course Image" class="w-48 h-48 object-cover">

        <!-- Contenu de la carte -->
        <div class="p-4 flex flex-col justify-between flex-grow">
            <!-- Titre et auteur -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-1"><?= $course['title']?></h3>
            </div>

            <!-- Note et nombre d'étudiants -->
            <div class="flex items-center mb-3">
                <span class="text-yellow-400">★★★★★</span>
                <span class="text-sm text-gray-500 ml-2">4.7 (80,000 étudiants)</span>
            </div>

            <!-- Bouton pour accéder au cours -->
            <a href="detailsCourse.php?course_id=<?= $course['course_id']?>&type=<?= $course['type']?>" class="block w-full text-center text-sm font-medium text-white bg-green-500 px-4 py-2 rounded-md hover:bg-green-600 transition-colors duration-200">
                Accéder au cours
            </a>
        </div>
    </div>
    <?php }?>
</div>

<?php include_once 'footer.php';?>