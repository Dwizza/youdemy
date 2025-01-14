<?php
require_once '../config/database.php';
class UserRepo{
    static public function register(User $user){
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
    static public function login($email,$password){
        try{
                $conn = Database::getConnection();
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->execute([':email' => $email]);
                $myuser = $stmt->fetch();
            
            if ($myuser && password_verify($password, $myuser["password_hash"])) {
                
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["userid"] = $myuser["user_id"];
                $_SESSION["userName"] = $myuser["username"];
                $_SESSION["email"] = $myuser["email"];
                $_SESSION["role"] = $myuser["role"];
                $_SESSION["status"] = $myuser["status"];
    
                if ($myuser["role"] == "admin" && $myuser['status']=='active') {
                    header("Location: ../dashboard/index.php");
                }else if($myuser["role"] == "teacher" && $myuser['status']=='active') {
                    header("Location: ../viewEnseignant/index.php");
                }else if($myuser["role"] == "student" && $myuser['status']=='active') {
                    header("Location: ../viewEnseignant/index.php");
                }else if($myuser['status']=='inactive'){
                    header("Location: ../viewEnseignant/error.php");
                }
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

    static public function logout(){
        session_destroy();
        header("location:../viewEnseignant/index.php");
    }
    static public function displayUsers(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users where role != 'admin'");
        $stmt->execute();
        $users = $stmt->fetchAll();
        foreach($users as $user){
            echo "<tr class='border-b text-center'>";
                echo  "<td class='p-1'>".$user['username']."</td>";
                echo "<td class='p-1'>".$user['email']."</td>";
                echo "<td class='p-1'>".$user['role']."</td>";
                echo "<td class='p-2'>";
                if($user['status']=='active'){ 
                    echo "<a href='../classes/is_active.php?id=".$user['user_id']."' class='bg-green-500 text-white px-3 py-2 rounded text-sm cursor-pointer'>Activer</a>";
                }else{
                    echo "<a href='../classes/is_active.php?id=".$user['user_id']."' class='bg-red-500 text-white px-3 py-2 rounded text-sm cursor-pointer'>Désactiver</a>";
                }
                echo "</td></tr>";
        }
        
    }
}
if(isset($_GET['id'])){
session_start();
$logout = new UserRepo();
$logout::logout();
}
?>
