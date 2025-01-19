<?php 
include_once '../config/database.php';
class StudentCourses{

    public function studentCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses 
                                join enrollments ON courses.course_id = enrollments.course_id
                                join users ON users.user_id = enrollments.student_id
                                where enrollments.student_id = :student_id");
        $stmt->execute([':student_id' => $_SESSION['userid']]);
        $studentCourses = $stmt->fetchAll();

        return $studentCourses;
    }
}
?>