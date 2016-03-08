<?php

interface IStrategy {
    public function show();
}

class Man implements IStrategy{
    public function show() {
        echo "男性策略:展示手机和电脑\r\n";
    }
}


class Woman implements IStrategy{
    public function show() {
        echo "女性策略:展示化妆品和衣服\r\n";
    }    
}


class Test {
    
    private $stratrgy;
    
    public function setStrategy(IStrategy $stratrgy) {
        $this->stratrgy = $stratrgy;
    }
    
    public function display() {
        if($this->stratrgy)
            $this->stratrgy->show();
        else 
            echo "无策略展示\r\n"; 
        
    }
    
}


$o = new Test();
$o->setStrategy(new Man);
$o->setStrategy(new Woman);
$o->display();



?>
