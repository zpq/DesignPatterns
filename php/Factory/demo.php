<?php
class Human {
    private $name;
    public function __construct($name='') {
        $this->name = $name;
    }
    
    public function speak() {
        echo "Hello, I am $this->name!\r\n";
    }
}

class Animal{
    public function cry() {
        echo "5555555~~~\r\n";
    }
}

class Factory{
    public static function getHuman($name) {
        return new Human($name);
    }
    
    public static function getAnimal() {
        return new Animal();
    } 
}

$xiaoming = Factory::getHuman("xiaoming");
$dog = Factory::getAnimal();

$xiaoming->speak();
$dog->cry();





?>
