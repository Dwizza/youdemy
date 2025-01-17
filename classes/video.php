<?php 
include_once 'course.php';
class Video extends Course{
    public function __construct($title = null, $description = null, $thumbnail = null, $category_id = null, $teacher_id = null, $content = null, $type = null){
        parent::__construct( $title, $description, $thumbnail, $category_id, $teacher_id, $content);
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
            ':type' => 'video'
        ]);
        $course_id = $conn->lastInsertId();
        foreach($tags as $tag){
            $stmt = $conn->prepare("INSERT INTO coursetags (course_id, tag_id) VALUES (:course_id, :tag_id)");
            $stmt->execute([':course_id' => $course_id, ':tag_id' => $tag]);
        }
    }
}

?>