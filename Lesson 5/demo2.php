<?php

/*
    Access Modifiers

    public 
    ->The property or method can be 
      accessed from anywhere. This is the 
      default if you leave the modifier


      -protected
      The property or method can be accessed from within the class OR class that inherits from it

      -private
      The property or method can ONLY be accesssed from within the class
*/


class User{
    //properties
    public $name;
    public $email;
    private $status = 'active';

    //constructor
    public function __construct($name, $email){
        $this->name = $name;
        $this->email = $email;
    }

    //related methods
    public function login(){
        echo $this->name . ' The user is logged in.';
    }

    //getter method
    public function getStatus(){
        echo $this->status;
    }

    //setter method
    public function setStatus($status){
        $this->status = $status;
    }

}



//Instatntiate a new object using constructor
$user1 = new User('Yna Marie', 'ynamarie@gmail.com');
$user1->login();

echo "<br>";
echo "<br>";

$user2 = new User('Zaira Marie', 'zairamarie@gmail.com');
$user2->login();
echo "<br>";

$user2->setStatus('inactive');
$user2->getStatus();

