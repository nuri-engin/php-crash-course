<?php 

require_once "Person.php";


class Student extends Person {
    public string $studentId;
    
    public function __construct($name, $surname, $studentId, $city)
    {
        parent::__construct($name, $surname);
        $this->city = 
        $this->studentId = $studentId;
    }
}

?>
