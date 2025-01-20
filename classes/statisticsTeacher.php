<?php 
class StatisticsTeacher{

    public function myCoursesEnrolled(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT courses.course_id, courses.teacher_id, courses.title, courses.content, courses.status, courses.type, COUNT(enrollments.course_id) AS enrollment_count
                                    FROM courses
                                    JOIN enrollments ON enrollments.course_id = courses.course_id
                                    WHERE courses.teacher_id = :teacher_id
                                    GROUP BY courses.course_id;");
        $stmt->execute([
            ':teacher_id' => $_SESSION['userid']
        ]);    
        return $stmt->fetchAll();
    }
    public function myCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses
                                        WHERE teacher_id = :teacher_id;");
        $stmt->execute([
            ':teacher_id' => $_SESSION['userid']
        ]);    
        return $stmt->fetchAll();
    }
    public function allStudents(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT courses.teacher_id, COUNT(DISTINCT enrollments.student_id) AS total
                                FROM courses
                                JOIN enrollments ON enrollments.course_id = courses.course_id
                                WHERE courses.teacher_id = :teacher_id
                                GROUP BY courses.teacher_id;");
        $stmt->execute([
            ':teacher_id' => $_SESSION['userid']
        ]);
        return $stmt->fetch();
    }
    public function allCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT COUNT(course_id) AS total
                                    FROM courses
                                    WHERE teacher_id = :teacher_id;");
        $stmt->execute([
            ':teacher_id' => $_SESSION['userid']
        ]);
        return $stmt->fetch();
    }
}

?>