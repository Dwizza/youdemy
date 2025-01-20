<?php 
include_once 'course.php';
class Pdf extends Course{

    public function __construct($title = null, $description = null, $thumbnail = null, $category_id = null, $teacher_id = null, $content = null){
        parent::__construct($title, $description, $thumbnail, $category_id, $teacher_id, $content);
    }
    public function addCourse($tags){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO courses (title, description, thumbnail, category_id, teacher_id, content, type)
        VALUES (:title, :description, :thumbnail, :category_id, :teacher_id, :content, :type)");
        $stmt->execute([
            ':title' => $this->title, 
            ':description' => $this->description, 
            ':thumbnail' => $this->thumbnail, 
            ':category_id' => $this->category_id, 
            ':teacher_id' => $this->teacher_id, 
            ':content' => $this->content, 
            ':type' =>'pdf'
        ]);
        $course_id = $conn->lastInsertId();
        foreach($tags as $tag){
            $stmt = $conn->prepare("INSERT INTO coursetags (course_id, tag_id) VALUES (:course_id, :tag_id)");
            $stmt->execute([':course_id' => $course_id, ':tag_id' => $tag]);
        }
    }
    
    public function displayCourses($course_id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT users.username, c.`course_id`, c.title, c.description, c.content, c.teacher_id, c.category_id, c.updated_at, c.created_at, c.thumbnail, c.type, c.status ,
                GROUP_CONCAT(t.name ORDER BY t.name) AS tags, c.type, 
                cat.name  AS category
                FROM courses c
                join users on users.user_id = c.teacher_id
                LEFT JOIN Coursetags ct ON c.course_id = ct.course_id
                LEFT JOIN Tags t ON ct.tag_id = t.tag_id
                LEFT JOIN Categories cat ON c.category_id = cat.category_id
                WHERE c.type = 'pdf' AND c.course_id = :course_id AND  users.user_id = c.teacher_id
                GROUP BY c.course_id;");
        $stmt->execute([':course_id' => $course_id]);
        $course = $stmt->fetch();
        return $course;
    }
    public function editCourse($course_id, $tags) {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE courses SET title = :title, description = :description, thumbnail = :thumbnail, category_id = :category_id, content = :content WHERE course_id = :course_id");
        $stmt->execute([
            ':title' => $this->title,
            ':description' => $this->description,
            ':thumbnail' => $this->thumbnail,
            ':category_id' => $this->category_id,
            ':content' => $this->content,
            ':course_id' => $course_id
        ]);
        $stmt = $conn->prepare("DELETE FROM coursetags WHERE course_id = :course_id");
        $stmt->execute([':course_id' => $course_id]);
        foreach($tags as $tag){
            $stmt = $conn->prepare("insert into coursetags (course_id, tag_id) values (:course_id, :tag_id )");
            $stmt->execute([':course_id' => $course_id, ':tag_id' => $tag]);
        }
    }
    public function getCourse($course_id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses WHERE course_id = :course_id");
        $stmt->execute([':course_id' => $course_id]);
        $course = $stmt->fetch();
        return $course;
    }
}
