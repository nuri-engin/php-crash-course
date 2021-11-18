<?php

// Create simple string
$name = 'Nuri';

$string = 'Hello I am '.$name.'. I am 33 years old';
$string2 = "Hello I am $name. I am 28";

echo $string.'<br>';
echo $string2.'<br>';

// String concatenation
echo 'Hello'.'World'.' and PHP'.'<br><br>';

// String functions
// strl($string); trim($string); lt($string); rtrim($string); str_word_count($string); 
// strrev($string); strtoupper($string); strtolower($string); ucfirst($string); lcfirst($string); 
// ucword($string); strpos($string, 'world'); stripos($string, 'world'); substr($string, 8, 6); 
// str_replace('World', 'PHP', $string); str_ireplace('world', 'PHP', $string);     

// Multiline text and line breaks
$longText = "
    Hello, Nuri
    Age 33,
    Love Mona
";  

echo $longText.'<br>';
echo nl2br($longText).'<br>';

// Multiline text and reserve html tags
$longText2 = "
    Hello, <b>Nuri</b>
    Age 33,
    Love <b>Mona</b>
";  

echo $longText.'<br>';
echo nl2br($longText2).'<br>';
echo htmlentities($longText2).'<br>';
echo nl2br(htmlentities($longText2)).'<br>';
echo html_entity_decode('Love &lt;b&gt;Mona&lt;/b&gt;');

// https://www.php.net/manual/en/ref.strings.php