<?php

//Variable scope

//global scope

$name = 'Luffy';

function sayHellO() {
    global $name;
    echo 'Hello ' .$name . '<br>';
}

sayHello();


function sayGoodbye() {
    $names = ['Luffy', 'Zoro', 'Sanji'];
    echo 'Goodbye ' .$names[0];
}

//sayGoodbye();

echo $names[0];