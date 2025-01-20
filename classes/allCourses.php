<?php 
class AllCourses{

    public function displayAllCourses($offset){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT users.username, c.`course_id`, c.title, c.description, c.content, c.teacher_id, c.category_id,c.created_at, c.thumbnail, c.type, c.status ,
                GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags, c.type, 
                cat.name  AS category
                FROM courses c
                join users on users.user_id = c.teacher_id
                LEFT JOIN Coursetags ct ON c.course_id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.tag_id
                LEFT JOIN Categories cat ON c.category_id = cat.category_id
                where c.status = 'active'
                GROUP BY c.course_id
                order by c.course_id asc limit 4 offset :offset;");
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $courses = $stmt->fetchAll();
        return $courses;
    }
    public function displayCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT users.username, c.course_id, c.title, c.description, c.content, c.teacher_id, c.category_id, c.created_at, c.thumbnail, c.type, c.status,
                                        GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags, cat.name AS category
                                        FROM courses c
                                        JOIN users ON users.user_id = c.teacher_id
                                        LEFT JOIN Coursetags ct ON c.course_id = ct.course_id
                                        LEFT JOIN Tags t ON ct.tag_id = t.tag_id
                                        LEFT JOIN  Categories cat ON c.category_id = cat.category_id
                                        GROUP BY c.course_id, users.username, c.title, c.description, c.content, c.teacher_id, c.category_id, c.created_at, c.thumbnail, c.type, c.status, cat.name
                                        ORDER BY c.status ASC
                                        LIMIT 4;");
        $stmt->execute();
        $courses = $stmt->fetchAll();
        return $courses;
    }
    public function valideCourses($course_id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE courses SET status = 'active' WHERE course_id = :course_id");
        $stmt->execute([':course_id' => $course_id]);
    }
    public function studentCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses 
                                        join enrollments ON courses.course_id = enrollments.course_id
                                        join users ON users.user_id = enrollments.student_id
                                        where enrollments.student_id = users.user_id");
        $stmt->execute();
    }
    public function searchCourses($offset){
        $conn = Database::getConnection();
        $stmtCount = $conn->prepare("SELECT COUNT(*) AS total FROM courses WHERE status = 'active'");
        $stmtCount->execute();
        $totalItems = $stmtCount->fetchColumn();
        $totalPages = ceil($totalItems / 4);

        // Afficher les numéros de page avec style actif
        $currentPage = floor($offset / 4) + 1; // Calcule la page actuelle
        echo "<div class='flex justify-center mt-8 gap-4 m-auto'>";
        for ($i = 0; $i < $totalPages; $i++) {
            $pageOffset = $i * 4;
            $pageNumber = $i + 1;
            $activeClass = ($pageNumber == $currentPage) ? 'bg-green-700' : 'bg-green-500'; // Style actif
            echo "<a href='allCourses.php?offset=$pageOffset' class='px-4 py-2 $activeClass text-white rounded-lg hover:bg-green-600'>$pageNumber</a>";
        }
        echo "</div>";
    }
    public function searchByCategory($category_id){
        $conn = database::getConnection();
        $stmt = $conn->prepare("select * from courses 
                                        JOIN users ON courses.teacher_id = users.user_id
                                        where category_id = :category_id");
        $stmt->execute([':category_id' => $category_id]);
        $courses = $stmt->fetchAll();
        return $courses;

    }
}