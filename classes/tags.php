<?php 
include_once '../config/database.php';
class Tags{

    public function displayTags(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM tags");
        $stmt->execute();
        $tags = $stmt->fetchAll();
        return $tags;
    }
    public function addTag($tag){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO tags (name) VALUES (:name)");
        $stmt->execute([':name' => $tag]);
    }
    public function deleteTag($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM coursetags WHERE tag_id = :id");
        $stmt->execute([':id' => $id]);
        $stmt = $conn->prepare("DELETE FROM tags WHERE tag_id = :id");
        $stmt->execute([':id' => $id]);
    }
}

?>