<?php
interface IVehicle
{
    function run();
}

class Car implements IVehicle
{
    public function run() {
        echo __CLASS__ . " is runnning";
    }
}

class Bus implements IVehicle
{
    public function run() {
        echo __CLASS__ . " is runnning";
    }
}


interface IRoad
{
    function run();
}

class Street implements IRoad
{
    private $v;

    public function __construct(IVehicle $v) {
        $this->v = $v;
    }

    public function run() {
        $this->v->run();
        echo " on the street\r\n";
    }
}

class SpeedWay implements IRoad
{
    private $v;

    public function __construct(IVehicle $v) {
        $this->v = $v;
    }

    public function run() {
        $this->v->run();
        echo " on the speedWay\r\n";
    }
}

$st = new Street(new Bus);
$st->run();
$st = new Street(new Car);
$st->run();

$sp = new SpeedWay(new Bus);
$sp->run();
$sp = new SpeedWay(new Car);
$sp->run();

