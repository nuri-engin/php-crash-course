<?php

$age = 33;
$salary = 300000;

// Sample if
if ($age === 20) {
    echo "1";
}

// Without circle braces
if ($age === 20) 
    echo "1";

if ($age === 20) echo "1";

// Sample if-else
if ($age > 20) {
    echo "1";
} else {
    echo "2";
}

// Difference between == and ===
echo '<br>';
if ($age === 20) {
    echo "1".'<br>';
} 

if ($age === '20') {
    echo "2".'<br>';
} 

// if AND
// &&

// if OR
// ||

// Ternary if
echo $age < 22 ? 'Y' : 'O';

// Short ternary
$myAge = $age ?: 18;
echo '<pre>';
var_dump($myAge);
echo '</pre>';

// Null coalescing operator
$myName = isset($name) ? $name : 'John';
$name ?? 'John';

// switch
$userRole = 'admin'; //editor, user, admin

switch ($userRole) {
    case 'admin':
        echo 'admin';
        break;
    case 'editor':
        echo 'editor';
        break;
    case 'user':
        echo 'user';
        break;            
    default:
        echo 'Invalid role';
        break;
}