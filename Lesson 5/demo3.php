<?php
    //inheritance


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


    public function getStatus(){
        echo $this->status;
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

class Admin extends User{
    public $level;


    public function __construct($name, $email, $level){
        $this-> level = $level;
        parent::__construct($name, $email);
    }

    public function login(){
        echo 'Admin' . $this->name. 'logged in';
    }

    
}

$admin1 = new Admin('Francine Ferolino', 'francineferolino@gmail.com', 5);
echo $admin1->name;
echo '<br>';
echo $admin1->email;
echo '<br>';
echo $admin1->level;
echo '<br>';

$admin1->login();
echo '<br>';

$admin1->getStatus();
echo '<br>';
$admin1->login();
