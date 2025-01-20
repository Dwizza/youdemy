<?php 
class Enseignant extends User{
    private $role;
    public function __construct(){
        parent::__construct();
        $this->role = 'teacher';
    }
}
?>