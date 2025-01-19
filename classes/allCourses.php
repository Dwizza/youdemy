<?php 
class AllCourses{

    public function displayCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT users.username, c.`course_id`, c.title, c.description, c.content, c.teacher_id, c.category_id,c.created_at, c.thumbnail, c.type, c.status ,
                GROUP_CONCAT(t.name ORDER BY t.name) AS tags, c.type, 
                cat.name  AS category
                FROM courses c
                join users on users.user_id = c.teacher_id
                LEFT JOIN Coursetags ct ON c.course_id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.tag_id
                LEFT JOIN Categories cat ON c.category_id = cat.category_id
                GROUP BY c.course_id;");
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
}