<?php

// while
// while (true) {
//     # code...
// }

// Loop with $counter
$counter = 0;

// while ($counter < 10) {
//     echo $counter;
//     if ($counter === 5) {
//         break;
//     }
//     $counter++;
// }

// do - while
// echo 'do while'.'<br>';
// do {
//     echo $counter;
//     $counter++;
// } while ($counter < 10);

// for
// for ($i = 0; $i < 10; $i++) {
//     echo $i.'<br>';
// }

// foreach
// $fruits = ["A", "B", "C", "D"];

// foreach ($fruits as $i => $fruit) {
//     echo $i.''.$fruit;
// }

// Iterate Over associative array.
$person = [
    'name' => 'Nuri',
    'surname' => 'Engin',
    'age' => 33,
    'hobbies' => ['Jazz', 'Code']
];

foreach ($person as $key => $value) {
    if (is_array($value)) {
        echo $key.': '. implode(",", $value).'<br>';
    } else {
        echo $key.': '. $value.'<br>';
    }
}