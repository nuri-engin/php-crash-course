<?php
require_once "Person.php";
require_once "Student.php";

// What is class and instance

// $person = new Person();
// $person->name = 'Nuri';
// $person->surname = 'Engin';

// $person = new Person('Nuri', 'Engin');
// // $person->age = 33;
// $person->setAge(33);

// echo '<pre>';
// var_dump($person);
// echo '</pre>';

// echo $person->name.'<br>';
// echo $person->getAge().'<br>';

// $person2 = new Person('John', 'Doe');
// $person2->name = 'Some';
// $person2->surname = 'One';

// echo '<pre>';
// var_dump($person2);
// echo '</pre>';

// echo $person2->name.'<br>';
// echo $person2->getCounter().'<br>';
// echo $person2::getCounter().'<br>';
// echo Person::$counter.'<br>';
// echo Person::getCounter().'<br>';

$student = new Student("Student", "One", "A12345", "Antalya");

echo '<pre>';
var_dump($student);
echo '</pre>';

// Create Person class in Person.php

// Create instance of Person

// Using setter and getter