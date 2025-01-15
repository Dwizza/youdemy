<?php 
include_once '../classes/userRepo.php';
if(isset($_GET['id'])){
    session_start();
    $logout = new UserRepo();
    $logout::logout();
    }
?>