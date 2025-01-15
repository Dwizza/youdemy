<?php 
include_once '../config/database.php';
class Category{

    public static function addTag($category){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (:name)");
        $stmt->execute([':name' => $category]);
    }
    public static function displayCategories(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
        
    }
}
?>