<?php

abstract class Car {
    public $name;

    public function __construct($name) {
        $this->name=$name;
    }
    abstract public function intro() : string;
}

class Audi extends Car {
    public function intro(): string {
        return "I am an $this->name!";
    }
}

class Bmw extends Car {
    public function intro(): string {
        return "I am an $this->name!";
    }
}

class Mercedes extends Car {
    public function intro(): string {
        return "I am an $this->name!";
    }
}


$audi = new Audi('Audi Q7');
echo $audi->intro().PHP_EOL;

$bmw = new Bmw('BMW X5');
echo $bmw->intro().PHP_EOL;

$mercedes = new Mercedes('Mercedes-benz ML');
echo $mercedes->intro();