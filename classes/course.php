<?php 
abstract class Course{
    protected $id;
    protected $title;
    protected $description;
    protected $thumbnail;
    protected $category_id;
    protected $teacher_id;
    protected $content;
    public function __construct( $title=null, $description=null, $thumbnail=null, $category_id=null, $teacher_id=null, $content=null){
        // $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->thumbnail = $thumbnail;
        $this->category_id = $category_id;
        $this->teacher_id = $teacher_id;
        $this->content = $content;
    }
    
    abstract public function addCourse($tags);
    
}

?>