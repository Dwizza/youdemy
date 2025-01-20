<?php 
class StatisticsAdmin{

    public function CategoryByStudent(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("select cat.name, COUNT(c.course_id) total
                                        from categories cat
                                        JOIN courses c ON cat.category_id = c.category_id
                                        GROUP BY cat.name
                                        ORDER BY total DESC;");
        $stmt->execute();
        $categories = $stmt->fetchAll();
        return $categories;
    }

}
?>