<?php
/**
*抽象工厂模式， 把相互之间有关联的产品放到一个工厂中生产
*/

interface engine
{
    public function run();
}

interface wheel
{
    public function rotate();
}

class Xengine implements engine
{
    public function run() {
        echo __CLASS__ . " run\r\n";
    }
}

class Xwheel implements wheel
{
    public function rotate() {
        echo __CLASS__ . " rotate\r\n";
    }
}

abstract class CarFactory
{
    abstract public static function createEngine();
    abstract public static function createWheel();
}

class PorscheFactory extends CarFactory 
{
    public static function createEngine() {
        return new Xengine;
    }

    public static function createWheel() {
        return new Xwheel;
    }
}

/*************************************************/
$e = PorscheFactory::createEngine();
$e->run();
$w = PorscheFactory::createWheel();
$w->rotate();


