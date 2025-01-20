<?php 
include_once 'header.php';
include_once '../config/database.php';
include_once '../classes/statisticsTeacher.php';
include_once '../classes/video.php';
if(isset($_GET['course_id'])){
    $deleted = new Video();
    $deleted->deleteCourse($_GET['course_id']);
    header('Location: statisticteacher.php');
}
?>
<div class="container mx-auto p-8">
        <h1 class="text-3xl font-bold text-center mb-8">Statistiques des Cours</h1>

        <!-- Section Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Carte : Nombre d'étudiants inscrits -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Étudiants Inscrits</h2>
                <?php $allStudents = new StatisticsTeacher;
                $students=$allStudents->allStudents();
                echo "<p class='text-4xl font-bold text-blue-600'>".$students['total']."</p>";
                ?>
                <p class="text-gray-500">+50 cette semaine</p>
            </div>

            <!-- Carte : Nombre de cours -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Nombre de Cours</h2>
                <?php 
                $allCourses = new StatisticsTeacher;
                $courses=$allCourses->allCourses();
                echo "<p class='text-4xl font-bold text-green-600'>".$courses['total']."</p>";
                ?>
                <!-- <p class="text-4xl font-bold text-green-600">85</p> -->
                <p class="text-gray-500">+5 nouveaux cours</p>
            </div>

            <!-- Carte : Taux de complétion -->
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Taux de Complétion</h2>
                <p class="text-4xl font-bold text-purple-600">78%</p>
                <p class="text-gray-500">en moyenne</p>
            </div>
        </div>

        <!-- Tableau des cours populaires -->
        <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4">L'inscription dans les cours </h2>
            <table class="w-full text-left">
                <thead>
                    <tr class='border-b text-center'>
                        <th class="py-2">Nom du Cours</th>
                        <th class="py-2">Etudiant s'inscrit</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $affichage = new StatisticsTeacher();
                    $courses = $affichage->myCoursesEnrolled();
                    foreach($courses as $course){
                        echo "<tr class='border-b text-center'>";
                            echo  "<td class='p-3'>".$course['title']."</td>";;
                            echo  "<td class='p-1'>".$course['enrollment_count']."</td>";
                        echo "</tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <div class="mt-12 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Les cours </h2>
            <table class="w-full text-left">
                <thead>
                    <tr class='border-b text-center'>
                        <th class="py-2">Nom du Cours</th>
                        <th class="py-2">contenu du cours</th>
                        <th class="py-2">Status du cours</th>
                        <th class="py-2">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $affichage = new StatisticsTeacher();
                    $courses = $affichage->myCourses();
                    foreach($courses as $course){
                        echo "<tr class='border-b text-center'>";
                            echo  "<td class='p-3'>".$course['title']."</td>";
                            echo  "<td class='p-1'><a href='detailsCourse.php?course_id=".$course['course_id']."&type=".$course['type']."&user_id=".$course['teacher_id']."' class='bg-green-500 px-4 py-2 rounded-lg hover:bg-green-800 text-white text-md font-medium'>Content link</a></td>";
                            echo  "<td class='p-1'>".$course['status']."</td>";
                            echo  "<td class='p-1'>
                                        <a href='addcourse.php?course_id=".$course['course_id']."' class='text-green-400 hover:text-green-600 px-2'><i class='fa-solid fa-pen-to-square'></i></a>
                                        <a href='statisticteacher.php?course_id=".$course['course_id']."' class='text-red-400 hover:text-red-600 px-2'><i class='fa-solid fa-trash'></i></a>
                                    </td>";
                        echo "</tr>";
                    }
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
<?php include_once 'footer.php';?>