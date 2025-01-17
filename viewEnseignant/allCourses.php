<?php include_once 'header.php'?>
<h2 class="text-2xl font-bold text-gray-800 mb-2 text-center mt-8">Tous les cours</h2>
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
<div class="container flex flex-wrap mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">   
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

<?php include_once 'footer.php'?>