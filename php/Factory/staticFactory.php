<?php
/**
*简单工厂模式
*优点： 简单粗暴
*缺点： 当需要新增其他对象时，必须修改Factory类中的逻辑代码，不符合开闭原则
*/

class Dota
{
    public function __construct() {
        echo "I am dota!\r\n";
    }
}

class Lol
{
    public function __construct() {
        echo "I am Lol!\r\n";
    }
}

class Factory 
{
    public static function createGame($class) {
        if ($class === "dota") {
            return new Dota;
        } elseif ($class === "lol") {
            return new Lol;
        } else {
            throw new Exception('unknown class!');
        }
    }
}

/***************************************/
Factory::createGame('dota');
Factory::createGame('lol');


