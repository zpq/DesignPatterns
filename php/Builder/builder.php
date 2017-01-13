<?php
/**
* 建造者模式, 用于构建复杂的对象
*
*/

abstract class Builder
{
    protected $person;
    abstract public function buildHead();
    abstract public function buildBody();
    abstract public function buildHand();
    abstract public function buildLeg();
    abstract public function result();
}

class PersonBuilder extends Builder
{
    public function __construct() {
        $this->person = new Person;
    }

    public function buildHead() {
        $this->person->setHead("头");
    }

    public function buildBody() {
        $this->person->setBody("身体");
    }

    public function buildHand() {
        $this->person->setHand("手");
    }

    public function buildLeg() {
        $this->person->setLeg("腿");
    }

    public function result() {
        return $this->person;
    }
}

class Person
{
    protected $head;
    protected $body;
    protected $hand;
    protected $leg;

    public function setHead($head) {
        $this->head = $head;
    }
    
    public function setBody($body) {
        $this->body = $body;
    }

    public function setHand($hand) {
        $this->hand = $hand;
    }

    public function setLeg($leg) {
        $this->leg = $leg;
    }

    public function show() {
        echo "这个人由 " . $this->head . " 和 " . $this->body . " 和 " .$this->hand . " 和 " . $this->leg . " 组成\r\n"; 
    }
}

class Director
{
    protected $builder;

    // public function __construct(Builder $builder) {
    //     $this->builder = $builder;
    // }

    public function startBuild() {
        $this->builder->buildHead();
        $this->builder->buildBody();
        $this->builder->buildHand();
        $this->builder->buildLeg();
        return $this->builder->result();
    }

    public function setBuilder(Builder $builder) {
        $this->builder = $builder;
    }
}

/*******************************************************/

$d = new Director();
$pb = new PersonBuilder();
$d->setBuilder($pb);
$p = $d->startBuild();
$p->show();

