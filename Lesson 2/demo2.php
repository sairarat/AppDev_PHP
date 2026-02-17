<?php

//Array Functions

$ids = [10, 22, 15, 45, 67, 33];
$users = ['user2', 'user1', 'user3'];

//The count() function returns the number of elements in an array
echo '<pre>';
//var_dump(count($users));
echo '</pre>';

//sort() function array in ascending order
echo '<pre>';
//var_dump(sort($ids));
//var_dump($ids);
echo '</pre>';

//rsort() function array in descending order
rsort($ids);
rsort($users);

echo '<pre>';
//var_dump($ids);
echo '</pre>';

//array_push() function inserts one or more element at the end of the array
array_push($ids, 100);
array_push($users, 'user4');

echo '<pre>';
//var_dump($users);
echo '</pre>';

//array_pop() function deletes the last element in an array
array_pop($ids);
array_pop($users);

echo '<pre>';
//var_dump($users);
echo '</pre>';

//array_shift function deletes the first element in an array
array_shift($ids);
array_shift($users);

echo '<pre>';
//var_dump($users);
echo '</pre>';

$ids = [10, 22, 15, 45, 67, 33];
$users = ['user2', 'user1', 'user3'];

//array_unshift() function inserts an element at the beginning of the array
array_unshift($ids, 200);
array_unshift($users, 'user3');

echo '<pre>';
//var_dump($ids);
echo '</pre>';

$ids = [10, 22, 15, 45, 67, 33];
$users = ['user2', 'user1', 'user3'];

//array_slice() function returns selected parts of an array
//first parameter is the array identifier, 2nd is the start index, 3rd is the number of elements to be sliced
$ids2 = array_slice($ids, 2, 3);
echo '<pre>';
var_dump($ids2);
echo '</pre>';

//array_sum function returns the sum of all the values in the array
$output = 'Sum of IDs: '. array_sum($ids);
//echo $output;

//array_search() function search an array for a value and returns it
//1st parameter is the selected value, 2nd parameter is the name of the array
$output = 'User 2 is at index: '. array_search('user2', $users);
echo $output;

//explode() function breaks a string into an array
$tags = 'tech,code,programming';
$tagsArr = explode(',', $tags);

echo '<pre>';
//var_dump($tagsArr);
echo '</pre>';

//implode() function returns a string from the elements of an array
$output = implode(', ', $users);

echo $output;