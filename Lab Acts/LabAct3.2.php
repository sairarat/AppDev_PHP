<?php
/*
 Challenge 2: Get the sum of the numbers in an array by using a foreach loop and for loop. 
*/

$numbers = [1, 2, 3, 4, 5]; //sum using foreach loop
$numbers2 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 19];  //sum using for loop

// solution goes here

echo 'Sum array using foreach loop <br>';
$sum1 = 0;
foreach ($numbers as $number) {
    $sum1 += $number;
}
echo $sum1 . '<br>';

echo 'Sum array using for loop <br>';
$sum2 = 0;
for ($i = 0; $i < count($numbers2); $i++) {
    $sum2 += $numbers2[$i];
}
echo $sum2;

/* sample output
Sum array using foreach loop
15
Sum array using for loop
64
*/
?>