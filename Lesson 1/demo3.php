<?php


//string
$name = 'Monkey D. Luffy';
$name2 = "Roronoa Zoro";
var_dump($name2);
echo '<br>';
echo gettype($name);
echo '<br>';

//integer
$age = 35;
var_dump($age);
echo '<br>';

//float
$rating = 4.5;
var_dump($rating);
echo '<br>';

//boolean

$is_loaded = true;
var_dump($is_loaded);
echo '<br>';

//array
$fruits = array('Apple', 'Banna', 'Mango');
var_dump($fruits);
echo '<br>';
echo gettype($fruits);
echo '<br>';

//object
$person = new stdClass();
var_dump($person);
echo '<br>';
echo gettype($person);

//null
$animal = null;
echo '<br>';
var_dump($animal);

//resource
$file = fopen('sample.txt', 'r');
echo gettype($file);