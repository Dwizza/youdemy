<?php
require_once '../config/database.php';
class UserRepo{
    public function register(User $user){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, role, status) VALUES (:username, :email, :password, :role, :status)");
        $stmt->execute([
            ':username' => $user->getUsername(),
            ':email' => $user->getEmail(),
            ':password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            ':role' => $user->getRole(),
            ':status' => $user->getStatus()
        ]);
    }
    public function login($email,$password){
        try{
                $conn = Database::getConnection();
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->execute([':email' => $email]);
                $myuser = $stmt->fetch();
            
            if ($myuser && password_verify($password, $myuser["password_hash"])) {
                
                
                $_SESSION["userid"] = $myuser["user_id"];
                $_SESSION["userName"] = $myuser["username"];
                $_SESSION["email"] = $myuser["email"];
                $_SESSION["role"] = $myuser["role"];
                $_SESSION["status"] = $myuser["status"];
    
                if ($myuser["role"] == "admin" && $myuser['status']=='active') {
                    header("Location: ../dashboard/index.php");
                }else if($myuser["role"] == "teacher" && $myuser['status']=='active') {
                    header("Location: ../view/index.php");
                }else if($myuser["role"] == "teacher" && $myuser['status']=='pending') {
                    header("Location: ../view/pending.php");
                }else if($myuser["role"] == "student" && $myuser['status']=='active') {
                    header("Location: ../view/index.php");
                }else if($myuser['status']=='inactive'){
                    header("Location: ../view/error.php");
                }
            }else{
                echo "<div class='bg-red-500 rounded-md  text-white text-center w-full'>Mot de passe incorrect</div>";
            }
        }catch (PDOException){
            echo "<script>Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid email or password',
                showConfirmButton: false,
                timer: 1500
            });</script>";
        }
    }
    public function logout(){
        session_destroy();
        header("location:../view/index.php");
    }
    public function displayUsers(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users where role != 'admin' AND status != 'pending'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        foreach($users as $user){
            echo "<tr class='border-b text-center'>";
                echo  "<td class='p-1'>".$user['username']."</td>";
                echo "<td class='p-1'>".$user['email']."</td>";
                echo "<td class='p-1'>".$user['role']."</td>";
                echo "<td class='p-2'>";
                if($user['status']=='active'){ 
                    echo "<a href='../dashboard/usergestion.php?id=".$user['user_id']."' class='bg-green-500 text-white px-3 py-2 rounded text-sm cursor-pointer'>Activer</a>";
                }else{
                    echo "<a href='../dashboard/usergestion.php?id=".$user['user_id']."' class='bg-red-500 text-white px-3 py-2 rounded text-sm cursor-pointer'>Désactiver</a>";
                }
                echo "</td></tr>";
        }
        
    }
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
    public function displayPendingUsers(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users where role != 'admin' AND status = 'pending'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
        
    }
    public function valideTeachers($id, $status){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("UPDATE users SET status = :status where user_id = :id");
        $stmt->execute([
            ':id' => $id,
            ':status' => $status,
        ]);
    }
    public function checkEnrollCourse($course_id, $student_id){
        $conn = Database::getConnection();
        $checkStmt = $conn->prepare("SELECT COUNT(*) FROM enrollments WHERE course_id = :course_id AND student_id = :student_id");
        $checkStmt->execute([
            ':course_id' => $course_id,
            ':student_id' => $student_id
        ]);
       
        return $checkStmt->fetchColumn();
    }
    public function enrollCourses($count, $course_id, $student_id){
        if ( $count == 0) {
            $conn = Database::getConnection();
            $stmt = $conn->prepare("INSERT INTO enrollments (course_id, student_id) VALUES (:course_id, :student_id)");
            $stmt->execute([
                ':course_id' => $course_id,
                ':student_id' => $student_id
            ]);
        }
    }
}
?>
