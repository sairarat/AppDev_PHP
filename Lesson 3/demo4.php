<?php

$number = 1;
$i = null;

while($number <= 10){
    if($number % 2 == 0){
        echo $number . ' is even <br>';
    }else{
        echo $number . ' is odd <br>';
    }
    $number++;
}

//break out of a loop
for($i - 1; $i <= 10; $i++){
    if($i == 5){
        break;
    }
    echo $i . '<br>';
}


//skip and continue
for($i = 1; $i <= 10; $i++){
    if($i == 5){
        echo $i . '5 is found' .'<br>';
        continue;
    }
    echo $i. '<br>';
}

$studentGrades = array(
    'John' => 75,
    'Jack' => 92,
    'Jill' => 100,
    'Joan' => 80
);

foreach ($studentGrades as $name => $grade){
    if($grade >= 90){
        echo $name . ' has an excellent grade <br>';
    }
}