<?php

$names = array('Francine', 'Yna', 'Zaira'); //Method 1
$names = ['Francine', 'Yna', 'Zaira']; //Method 2
$numbers = [1, 2, 3, 4, 5, 6];

//echo $names[2];

/* 
Checking Details of variables
var_dump($names[1]);
*/

echo '<pre>';
//appending or adding values in the array
$numbers[] = 100;
$numbers[] = 101;
$numbers[3] = 400;

unset($numbers[3]);//removing a value in the array
$numbers = array_values($numbers); //reindexing or reorganizing the array

var_dump($numbers);
echo '</pre>';