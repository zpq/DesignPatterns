<?php
/**
*工厂方法模式
*优点: 符合开闭原则，当需要新增对象时，添加一个具体的工厂类和具体的产品类就行了，不需要修改核心工厂类
*缺点：具体的工厂类只能生产一种产品
*/

interface car
{
    public function run();
    public function stop();
}

class Porsche implements car
{
    public function run() {
        echo __CLASS__ . " run\r\n";
    }

    public function stop() {
        echo __CLASS__ . " stop\r\n";
    }
}

class Ferrari implements car
{
    public function run() {
        echo __CLASS__ . " run\r\n";
    }

    public function stop() {
        echo __CLASS__ . " stop\r\n";
    }
}


abstract class Factory 
{
    abstract public static function create();
}

class PorscheFactory extends Factory 
{
    public static function create() {
        return new Porsche;
    }
}

class FerrariFactory extends Factory
{
    public static function create() {
        return new Ferrari;
    }
}

/********************************************/

$f = FerrariFactory::create();
$f->run();
$f->stop();

$p = PorscheFactory::create();
$p->run();
$p->stop();
