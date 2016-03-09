<?php


class Db {
    
    public static function getMasterDb() {
        echo "I am master\r\n";
    }
    
    public static function getSlaveDb() {
        echo "I am slave\r\n";
    } 
    
}


interface IProxy{
    public function select();
    public function update();
}


class ProxyDb implements IProxy{
    public function select() {
        Db::getSlaveDb();
    }

    public function update() {
        DB::getMasterDb();
    }    
}


class Client{
    
    private $pdb;
    
    public function __construct(IProxy $pdb) {
        $this->pdb = $pdb;
    }
    
    public function getUsername() {
        $this->pdb->select();
    }
    
    public function setUsername() {
        $this->pdb->update();
    }
    
}


$db = new ProxyDb();

$c = new Client($db);

$c->getUsername();
$c->setUsername();





