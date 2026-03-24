<?php
//abstract class
//template of properties and methods that can be used
//needs execution of inheritance
abstract class Shape{
    protected $name;
    abstract public function calculateArea();

    //constructor
    public function __construct($name){
        $this->name = $name;
    }

    //concrete method
    public function getName(){
        return $this->name;
    }
}

class Circle extends Shape{
    private $radius;

    public function __construct($name, $radius){
        parent:: __construct($name);
        $this->radius = $radius;
    }

    //Implement the abstract method to calculate area for a circle
    public function calculateArea(){
        return pi() * pow($this->radius, 3);
    }
}


class Rectangle extends Shape{
    private $width;
    private $height;

    public function __construct($name, $width, $height){
        parent:: __construct($name);
        $this->width = $width;
        $this->height = $height;
    }

    //implement abstract method to calculate are for rectangle
    public function calculateArea(){
        return $this->width * $this->height;
    }
}


//Create instances of concrete classes
$circle = new Circle('Circle', 5);
$rectangle = new Rectangle('Rectangle', 4, 6);

//call methods on object
echo $circle->getName(). ' Area: '. $circle->calculateArea(). '<br>';
echo $rectangle->getName(). ' Area: ' . $rectangle->calculateArea(). '<br>';
