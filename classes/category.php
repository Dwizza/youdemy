<?php 
include_once '../config/database.php';
class Category{

    public function addCategory($category){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute([':name' => $category]);
    }
    public function displayCategories(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
        
    }
    public function modifyCategory($id, $category){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE categories SET name = :name WHERE category_id = :id");
        $stmt->execute([':name' => $category, ':id' => $id]);
    }
    public function deleteCategory($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM categories WHERE category_id = :id");
        $stmt->execute([':id' => $id]);
    }

    
}
?>