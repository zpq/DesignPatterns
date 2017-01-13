<?php

class A
{
    public function actionA() {
        echo __CLASS__ . " action \r\n";
    }
}

class B
{
    public function actionB() {
        echo __CLASS__ . " action \r\n";
    }
}

class C
{
    public function actionC() {
        echo __CLASS__ . " action \r\n";
    }
}

class Facade
{
    private $a;
    private $b;
    private $c;

    public function __construct() {
        $this->a = new A;
        $this->b = new B;
        $this->c = new C;
    }

    public function action() {
        $this->a->actionA();
        $this->b->actionB();
        $this->c->actionC();
    }
}

$f = new Facade;
$f->action();
