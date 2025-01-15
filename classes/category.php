<?php 
include_once '../config/database.php';
class Category{
    public static function displayCategories(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM categories");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
        
    }
}
?>