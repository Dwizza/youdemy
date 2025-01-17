<?php 
class AllCourses{

    public function displayCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT c.`course_id`, c.title, c.description, c.content, c.teacher_id, c.category_id,c.created_at, c.thumbnail, c.type, c.status ,
                GROUP_CONCAT(t.name ORDER BY t.name) AS tags, c.type, 
                cat.name  AS category
                FROM courses c
                LEFT JOIN Coursetags ct ON c.course_id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.tag_id
                LEFT JOIN Categories cat ON c.category_id = cat.category_id
                GROUP BY c.course_id;");
        $stmt->execute();
        $courses = $stmt->fetchAll();
        return $courses;
    }
}