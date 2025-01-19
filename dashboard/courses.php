<?php include_once 'header.php';
include_once '../config/database.php';
include_once '../classes/allcourses.php';
if(isset($_GET['courseId'])){
    $validate = new AllCourses();
    $validate->valideCourses($_GET['courseId']);
}
 ?>
 <!-- Validation des cours -->
 <div class="bg-white w-full p-6 rounded-lg shadow-md mb-8">
                <h3 class="text-xl font-bold mb-4">Validation des cours</h3>
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-2">status</th>
                            <th class="p-2">Title</th>
                            <th class="p-2">Enseignant</th>
                            <th class="p-2">Content</th>
                            <th class="p-2">Description</th>
                            <th class="p-2">Type</th>
                            <th class="p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include_once '../classes/allcourses.php';
                        $affichage =new AllCourses();
                        $courses = $affichage->displayCourses();
                        foreach($courses as $course){
                            if($course['status'] == 'pending'){
                                echo "<tr class='border-b text-center'>";
                                echo  "<td class='p-1'><i class='fa-solid fa-circle-dot text-yellow-400'></i></td>";
                                echo  "<td class='p-1'>".$course['title']."</td>";
                                echo "<td class='p-1'>".$course['username']."</td>";
                                echo "<td class='p-1'><a href='../viewEnseignant/detailsCourse.php?course_id=".$course['course_id']."&type=".$course['type']."' class='px-4 py-2 cursor-pointer bg-green-500 hover:bg-green-800 rounded-lg text-white'><b>Course link</b></a></td>";
                                echo "<td class='p-1'>".$course['description']."</td>";
                                echo "<td class='p-1'>".$course['type']."</td>";
                                echo "<td class='p-2 flex justify-center gap-4'>";
                                echo "<a href='../dashboard/courses.php?courseId=".$course['course_id']."' class='bg-green-500 hover:bg-green-800 text-white px-3 py-2 rounded text-sm cursor-pointer'><b>Valider</b></a>";
                                echo "</td></tr>";
                            } 
                        }
                        ?>
                        <!-- Ajouter plus de lignes ici -->
                    </tbody>
                </table>
            </div>
<?php include_once 'footer.php'; ?>