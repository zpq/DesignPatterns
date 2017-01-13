<?php

interface IEquipment 
{
    function using();
}

class Butterfly implements IEquipment
{
    public function using() {
        echo " use " . __CLASS__ . "\r\n";
    }
}

class DragonHeart implements IEquipment
{
    public function using() {
        echo " use " . __CLASS__ . "\r\n";
    }
}

interface IRole
{
    function using();
}

class Magician implements IRole
{
    private $e;

    public function __construct(IEquipment $e) {
        $this->e = $e;
    }

    public function using() {
        echo __CLASS__ ;
        $this->e->using();
    }
}

class Warrior implements IRole
{
    private $e;

    public function __construct(IEquipment $e) {
        $this->e = $e;
    }

    public function using() {
        echo __CLASS__ ;
        $this->e->using();
    }
}

$m = new Magician(new Butterfly);
$m->using();
$m = new Magician(new DragonHeart);
$m->using();

$m = new Warrior(new Butterfly);
$m->using();
$m = new Warrior(new DragonHeart);
$m->using();


