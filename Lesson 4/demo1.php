<?php

//Function is a block of statements that can be used repeatedly in a program
//A function will not execute automatically when a page loads.
//A function will be executed by a call to the funciton

//simple function

function sayHello(){
    echo "Hello";
}

//call function
//sayHello();

//function return a value
function sayGoodbye(){
    return 'Goodbye';
}
sayGoodbye();
//echo sayGoodbye();

//store return in a variable
$goodbye = sayGoodbye();
echo $goodbye;

?>

