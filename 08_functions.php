<?php

// Function which prints "Hello I am Zura"
// function hello() {
//     echo "Hello, i am Nuri".'<br>';
// }

// hello();

// Function with argument
// function hello2($name) {
//     return  "Hello i am $name".'<br>';
// }

// echo hello2('Nuri');

// Create sum of two functions
// function sum ($a, $b) {
//     return $a + $b;
// };

// echo sum(4, 5).'<br>';

// Create function to sum all numbers using ...$nums
// function sum2 (...$nums) {
//     $sum = 0;

//     foreach ($nums as $num) {
//         $sum += $num;
//     }

//     return $sum;
// };

// echo sum2(1, 2, 3, 4, 5, 6, 7);

// Arrow functions
function sum3 (...$nums) {
    return array_reduce($nums, fn($carry, $n) => $carry + $n);
};

echo sum3(1, 2, 3, 4, 5, 6, 7);