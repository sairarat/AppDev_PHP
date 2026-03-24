<?php
//statis members and methods

class MathUtility{
    public static $pi = 3.14159;

    public static function add(...$nums){
        return array_sum($nums);
    }
}

echo MathUtility:: $pi . '<br>';
echo MathUtility:: $pi . '<br>';

echo MathUtility::add(1, 2, 3, 4) . '<br>';


/*
$Math1 = new MathUtility();
$Math2 = new MathUtility();
echo $Math1->pi . '<br>';
echo $Math2->pi . '<br>';
*/


