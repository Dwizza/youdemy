<?php 
class etudiant extends User{
    private $role;
    public function __construct(){
        parent::__construct();
        $this->role = 'student';
    }
}
?>