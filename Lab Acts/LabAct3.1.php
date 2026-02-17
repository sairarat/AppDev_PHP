<?php
/*
Challenge 1: Create a multiplication table using a nested `for` loop

*/

echo '<h1>Mutliplication Table</h1>';

for($i = 0; $i <= 10; $i++){
    for($j = 1; $j <= 10; $j++){
        echo $i . ' x ' . ' = ' . ($i * $j). '<br>';
    }
}