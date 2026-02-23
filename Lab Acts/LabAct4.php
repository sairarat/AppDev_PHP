<?php
/*
Write a program that prints the numbers from 1 to 100. 
But for number is divisible of three print “is divisible to 3” instead of the number
and for the number is divisible of five print “is divisible to 5”. 
For numbers which are divisible of both three and five print “is divisible to 3 and 5”.
Remember, you can use the modulus operator to check if a number is divisible by another number.
*/


$numbers = 100;

for($i = 1; $i <= $numbers; $i++){
    if($i % 3 == 0 && $i % 5 == 0){
        echo $i . " is divisible by 3 and 5 <br>";
    }else if ($i % 3 == 0){
        echo $i . " is divisible by 3 <br>";
    }else if ($i % 5 == 0){
        echo $i . " is divisible by 5 <br>";
    }else{
        echo $i . "<br>";
    }
}

