<?php

class User{
    //properties
    public $name;
    public $email;

    //constructor
    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }

    //related methods
    public function login(){
        echo $this->name . ' The user is logged in.';
    }

    public function logemail(){
        echo $this->email . ' The user email is logged in.';
    }
}

//Instantiate a new object
/*$user1 = new User();
$user1->name = 'Yna Marie';
$user1->email = 'ynamarie@gmail.com';

//var_dump($user1);
//$user1->login();

$user2 = new User();
$user2->name = 'Zaira Marie';
$user2->email = 'zairamarie@gmail.com';
//var_dump($user2);

echo $user1->name;
echo "<br>";
echo $user2->name;*/

//Instatntiate a new object using constructor
$user1 = new User('Yna Marie', 'ynamarie@gmail.com');
$user1->login();
echo "<br>";
$user1->logemail();
//$user2 = new User();
//var_dump($user1);

echo "<br>";
echo "<br>";

$user1 = new User('Zaira Marie', 'zairamarie@gmail.com');
$user1->login();
echo "<br>";
$user1->logemail();
