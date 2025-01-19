<?php 
class StatisticsTeacher{

    public function myCourses(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM courses WHERE teacher_id = :teacher_id");
        $stmt->execute([
            ':teacher_id' => $_SESSION['user_id']
        ]);    
        return $stmt->fetchAll();
    }

}

?>