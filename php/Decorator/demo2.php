<?php

interface HelloInterface{
    public function sayHello();
}

class Hello implements HelloInterface{
    public function sayHello() {
        echo "Hello world!\r\n";
    }
}

class HelloDecorator implements HelloInterface{
    
    private $wrapper;
    private $pre = array();
    private $after = array();
    
    public function __construct(HelloInterface $wrapper) {
        $this->wrapper = $wrapper;
    }
    
    public function addPreDecorator(IDecorator $dec) {
        $this->pre[] = $dec;
    }
    
    public function addAfterDecorator(IDecorator $dec) {
        $this->after[] = $dec;
    }
    
    public function sayHello() {
        foreach($this->pre as $prev) {
            $prev->dec();
        }
        
        $this->wrapper->sayHello();
        
//        $this->after = array_reverse($this->after);
        
        foreach($this->after as $afterv) {
            $afterv->dec();
        }
    }
    
}

interface IDecorator{
    public function dec();
}

class PreActionA implements IDecorator{
    public function dec() {
        echo "I am ".__CLASS__."\r\n";
    }
}

class PreActionB implements IDecorator{
    public function dec() {
        echo "I am ".__CLASS__."\r\n";
    }
}

class AfterActionA implements IDecorator {
    public function dec() {
        echo "I am ".__CLASS__."\r\n";
    }
}

class AfterActionB implements IDecorator {
    public function dec() {
        echo "I am ".__CLASS__."\r\n";
    }
}

$helloDec = new HelloDecorator(new Hello);

$helloDec->addPreDecorator(new PreActionA);
$helloDec->addAfterDecorator(new AfterActionA);
$helloDec->addPreDecorator(new PreActionB);
$helloDec->addAfterDecorator(new AfterActionB);

$helloDec->sayHello(); 











?>
