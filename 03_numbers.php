<?php

// Declaring numbers
$a = 5;
$b = 4;
$c = 1.2;

// Arithmetic operations
echo ($a + $b) * $c;
echo $a - $b.'<br>';
echo $a * $b.'<br>';
echo $a / $b.'<br>';
echo $a % $b.'<br>';

// Assignment with math operators
$a += $b; echo $a.'<br>';
$a -= $b; echo $a.'<br>';
$a *= $b; echo $a.'<br>';
$a /= $b; echo $a.'<br>';

// Increment operator
echo $a++.'<br>';
echo ++$a.'<br>';

// Decrement operator
echo $a--.'<br>';
echo --$a.'<br>';

// Number checking functions
echo is_float($a).'<br>';
echo is_integer($a).'<br>';
echo is_numeric($a).'<br>';
echo is_int($a).'<br>';
echo is_float($a).'<br>';

// Conversion
$strNumber = '12.34';
$number = (float)$strNumber;
$number = (int)$strNumber;
$number = intval($strNumber);

var_dump($number);

// Number functions
// int(); abs(); pow(); sqrt(); max(); 

// Formatting numbers
echo '<br>';
$number = 123456789.1234; //
echo number_format($number, 2, '.', ',');

// https://www.php.net/manual/en/ref.math.php
echo '<br>';
echo $_SERVER['HTTP_USER_AGENT'];