<?php


interface HelloInterface{
    public function sayHello();
}

class Hello implements HelloInterface{
    public function sayHello() {
        echo "Hello World!\r\n";
    }
}

abstract class Decorator implements HelloInterface{
    protected $wrapper;
    
    public function __construct(HelloInterface $wrapper) {
        $this->wrapper = $wrapper;
    }
    
}

class PreAction extends Decorator{
    public function sayHello() {
        echo "I am pre action\r\n";
        $this->wrapper->sayHello();
    }
}

class afterAction extends Decorator{
    public function sayHello() {
        $this->wrapper->sayHello();
        echo "I am after action\r\n";
    }
}

$pre = new PreAction(new afterAction(new Hello));
$pre->sayHello();
