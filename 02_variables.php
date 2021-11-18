<?php

// What is a variable

// Variable types

//String, Integer, Float, Boolean, Null, Array, Object, Resource

// Declare variables
$name = 'Nuri'; //string
$age = 28; //integer
$isMail = false; //Boolean
$height = 1.85; //Float-Double
$salary = null;

// Print the variables. Explain what is concatenation
echo $name.'<br>';
echo $age;

// Print types of the variables
echo $name.'<br>'; //string
echo $age.'<br>'; //integer
echo $isMail.'<br>'; //Boolean
echo $height.'<br>'; //Float-Double
echo $salary.'<br>';

// Print the whole variable
var_dump($name, $age, $isMail, $height, $salary);

// Change the value of the variable
$name = false;

// Print type of the variable
echo '<br>';
echo gettype($name).'<br>';
echo gettype($age).'<br>';
echo gettype($isMail).'<br>';
echo gettype($height).'<br>';
echo gettype($salary).'<br>';

// Variable checking functions
is_string($name);
is_int($age);
is_bool($isMail);
is_double($height);

// Check if variable is defined
isset($name); // true
isset($zip); // false

// Constants
define ('PI', 3.14);
echo PI;

// Using PHP built-in constants
echo SORT_ASC.'<br>';
echo PHP_INT_MAX.'<br>';