<?php 
class Admin extends User{
    private $role;
    public function __construct(){
        parent::__construct();
        $this->role = 'admin';
    }
}

?>