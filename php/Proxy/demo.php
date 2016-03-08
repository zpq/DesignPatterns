<?php


class DataBase {
    private $scenario = 'read';
    
    public function __construct() {
        return new self;
    }
    
    private function changeConnection() {
        echo "change to ".$this->scenario." database schema\n\r";
    }
    
    public function getScenario() {
        return $this->scenario;
    }
    
    public function setScenario($type) {
        if($type == 'read' || $type == 'write') {
            $this->scenario = $type;
        }
        $this->changeConnection();
    }
    
    
    
    
    
}


