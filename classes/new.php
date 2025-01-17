<?php
class User{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $status ;
    
    public function __construct($username = null, $email =null, $password =null, $role =null, $status=null){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
    }

    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function affichage(){
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users ");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

}
$skqjd = new User();
$skqjd->affichage();