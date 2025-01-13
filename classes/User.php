<?php
class User{
    private $id;
    private $username;
    private $email;
    private $password;
    private $role;
    private $status;
    
    function __construct($username, $email, $password, $role, $status){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
    }

    function getId(){
        return $this->id;
    }
    function setId($id){
        $this->id = $id;
    }
    function getUsername(){
        return $this->username;
    }
    function setUsername($username){
        $this->username = $username;
    }

    function getEmail(){
        return $this->email;
    }
    function setEmail($email){
        $this->email = $email;
    }

    function getPassword(){
        return $this->password;
    }
    function setPassword($password){
        $this->password = $password;
    }

    function getRole(){
        return $this->role;
    }
    function setRole($role){
        $this->role = $role;
    }

    function getStatus(){
        return $this->status;
    }
    function setStatus($status){
        $this->status = $status;
    }


}