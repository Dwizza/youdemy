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
    
                
                $_SESSION["userid"] = $myuser["id"];
                $_SESSION["userName"] = $myuser["username"];
                $_SESSION["email"] = $myuser["email"];
                $_SESSION["role"] = $myuser["role"];
    
                
                if ($myuser["role"] == "admin") {
                    header("Location: ../dashboard/index.php");
                } else {
                    header("Location: ../viewEnseignant/index.php");
                }
                exit();
            } else {
                echo "<script>
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'Invalid email or password',
                        showConfirmButton: false,
                        timer: 1500
                    });
                </script>";
            }
    
        
            // else{
            //     if($myuser['is_active']=='active'){
            //         header("location:index.php");
            //     }else{
            //         header("location:error.php");
            //     }
            // }
        }catch(PDOException){
            echo "<script>Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Invalid email or password',
                showConfirmButton: false,
                timer: 1500
            });</script>";;
        }
    }
        static public function logout(){
            session_destroy();
            header("location:../viewEnseignant/index.php");
        }
    
}
if(isset($_GET['id'])){
session_start();
$logout = new UserRepo();
$logout::logout();
}
?>
