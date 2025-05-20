<?php 
abstract class users{
    private $nom;
    private $age;
    private $status;

    public function __construct($nom, $age, $status){
        $this->nom = $nom;
        $this->age = $age;
        $this->status = $status;
    }

    abstract public function ajouter();
    abstract public function afficher();
}

class teacheer extends users{
    private $class;

    public function __construct($class,$nom, $age, $status){
        parent::__construct($nom, $age, $status);
        $this->class = $class;
    }
    public function ajouter(){

    }
    public function afficher(){
        
    }
}
$abid = new teacheer('abid', 28, 'active', 'A');
class student extends users{
    public function ajouter(){

    }
    public function afficher(){

    }
}


?>