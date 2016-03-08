<?php

interface IObserver{
    public function work();
    public function rest();
}


class Secretary{
    
    private $observer = array();
    
    public function addObserver(IObserver $ob) {
        $this->observer[] = $ob;
    }

    public function notify($type) {
        foreach($this->observer as $value) {
            $type ? $value->work() : $value->rest();
        }
    }
    
}

class Boss {
    public function out() {
        echo "boss am out\r\n";
    }
    
    public function back() {
        echo "boss am back\r\n";
    }
}

class Employee implements IObserver{
    
    private $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    
    public function rest() {
        echo $this->name . " rest! \r\n";
    }

    public function work() {
        echo $this->name . " work!\r\n";
    }    
}

$bs = new Boss;
$sec = new Secretary;
$sec->addObserver(new Employee('Jack'));
$sec->addObserver(new Employee('Mary'));

$bs->back();
$sec->notify(1);
$bs->out();
$sec->notify(0);





















?>
