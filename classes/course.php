<?php 
class Course{
    protected $id;
    protected $title;
    protected $description;
    protected $thumbnail;
    protected $category_id;
    protected $teacher_id;
    protected $content;
    protected $type;
    public function __construct($title=null, $description=null, $thumbnail=null, $category_id=null, $teacher_id=null, $content=null, $type=null){
        $this->title = $title;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->category_id = $category_id;
        $this->teacher_id = $teacher_id;
        $this->content = $content;
        $this->type = $type;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getThumbnail(){
        return $this->thumbnail;
    }
    public function getCategory(){
        return $this->category_id;
    }
    public function getTeacherId(){
        return $this->teacher_id;
    }
    public function getContent(){
        return $this->content;
    }
    public function getType(){
        return $this->type;
    }


    public function setId($id){
        $this->id = $id;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function setThumbnail($thumbnail){
        $this->thumbnail = $thumbnail;
    }
    public function setCategory($category_id){
        $this->category_id = $category_id;
    }
    public function setTeacherId($teacher_id){
        $this->teacher_id = $teacher_id;
    }
    public function setContent($content){
        $this->content = $content;
    }
    public function setType($type){
        $this->type = $type;
    }
    
    public function addCourse($tags){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO courses (title, description, thumbnail, category_id, teacher_id, content, type) VALUES (:title, :description, :thumbnail, :category_id, :teacher_id, :content, :type)");
        $stmt->execute([
            ':title' => $this->getTitle(),
            ':description' => $this->getDescription(),
            ':thumbnail' => $this->getThumbnail(),
            ':category_id' => $this->getCategory(),
            ':teacher_id' => $this->getTeacherId(),
            ':content' => $this->getContent(),
            ':type' => $this->getType()
        ]);
        $lastId = $conn->lastInsertId();
        foreach($tags as $tag){
            $stmt1 = $conn->prepare("INSERT INTO coursetags (course_id, tag_id) VALUES (:course_id, :tag_id)");
            $stmt1->execute([':course_id' => $lastId, ':tag_id' => $tag]);
        }
    }
    public function displayCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses 
        join categories on courses.category_id = categories.category_id 
        join users on courses.teacher_id = users.user_id
        join coursetags on courses.course_id = tags.tag_id");
        $stmt->execute();
        $courses = $stmt->fetchAll();
        return $courses;
    }
}

?>