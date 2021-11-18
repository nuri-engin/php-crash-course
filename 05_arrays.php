<?php

// Create array
// $fruits = ['Apple', 'Banana'];
// $fruits2 = array('apple', 'banana');
// echo $fruits.'<br>';
// echo $fruits2.'<br>';

// Print the whole array
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Get element by index
// echo $fruits[1].'<br>';

// Set element by index
// $fruits[0] = 'Peach';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Check if array has element at index 2
// isset($fruits[2]); //true

// Append element
// $fruits[] = 'Erik';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Print the length of the array
// echo count($fruits).'<br>';

// Add element at the end of the array
// array_push($fruits, 'Some');
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Remove element from the end of the array
// array_pop($fruits);
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Add element at the beginning of the array
// array_unshift($fruits, 'bar');
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Remove element from the beginning of the array
// array_shift($fruits);
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Split the string into an array
// $string = "Ba, Ap, Pe";
// echo '<pre>';
// var_dump(explode(",", $string));
// echo '</pre>';

// Combine array elements into string
// echo implode("&", $fruits).'<br>';

// Check if element exist in the array
// echo '<pre>';
// var_dump(in_array('App', $fruits));
// echo '</pre>';

// Search element index in the array
// echo '<pre>';
// var_dump(array_search('Peach', $fruits));
// echo '</pre>';

// Merge two arrays
// $vegatable = ["Potato", "Tomato"];
// $all = array_merge($fruits, $vegatable);
// echo '<pre>';
// var_dump($all);
// var_dump([...$fruits, ...$vegatable]);
// echo '</pre>';

// Sorting of array (Reverse order also)
// sort($fruits);
// rsort($fruits);
// echo 'SORT: '.'<br>';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// https://www.php.net/manual/en/ref.array.php

// ============================================
// Associative arrays
// ============================================

// Create an associative array
$person = [
    'name' => 'Nuri',
    'surname' => 'Engin',
    'age' => 33,
    'hobbies' => ['Tenis', 'Coding']
];

echo '<pre>';
// var_dump($person);
print_r($person);
echo '</pre>';

// Get element by key
echo $person['name'].'<br>';
echo $person['add'].'<br>';

// Set element by key
$person['channel'] = 'ABC Med';
echo '<pre>';
var_dump($person);
echo '</pre>';

// Null coalescing assignment operator. Since PHP 7.4
if (!isset($person['address'])) {
    $person['address'] = 'Unknown';
}

$person['city'] ??= 'Antalya';
$person['country'] = $person['country'] ?? 'Turkey';

echo '<pre>';
var_dump($person);
echo '</pre>';

// Check if array has specific key
// isset()

// Print the keys of the array
$keys = array_keys($person);

echo 'Keys';
echo '<pre>';
var_dump($keys);
echo '</pre>';

// Print the values of the array
echo 'Values';
echo '<pre>';
var_dump(array_values($person));
echo '</pre>';

// Sorting associative arrays by values, by keys
ksort($person);
asort($person);
echo 'KSort';
echo '<pre>';
var_dump($person);
echo '</pre>';

// Two dimensional arrays
$todos = [
    ['title' => 'Todo title 1', 'complate' => true],
    ['title' => 'Todo title 21', 'complate' => false]
];

echo 'Two Dimen';
echo '<pre>';
var_dump($todos);
echo '</pre>';
