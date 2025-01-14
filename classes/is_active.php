<?php 
include_once '../config/database.php';
class Is_active{
    public function is_active($id){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users where user_id = :id");
        $stmt->execute([':id' => $id]);
        $user = $stmt->fetch();
        if($user['status']=='active'){
            $stmt = $conn->prepare("UPDATE users SET status = 'inactive' WHERE user_id = :id");
            $stmt->execute([':id' => $id]);
        }else{
            $stmt = $conn->prepare("UPDATE users SET status = 'active' WHERE user_id = :id");
            $stmt->execute([':id' => $id]);
        }
    }
}
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $is_active = new Is_active();
    $is_active->is_active($id);
    header("Location: ../dashboard/userGestion.php");
}
?>
