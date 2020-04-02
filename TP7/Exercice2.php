<?php

abstract class Shape{
   abstract function getArea();
}

class Square extends Shape{
    private $width;
    private $height;

    function __construct($w,$h){
        $this->height=$h;
        $this->width=$w;
    }

    function getArea(){
        return $this->width*$this->height;
    }
}

class Circle extends Shape{
    private $radius;

    function __construct($r){
        $this->radius=$r;
    }

    function getArea(){
        return M_PI*pow($this->radius,2);
    }
}

$sq = new Square(5,4);
$cir = new Circle(4);
$tab = [$sq,$cir];
for($i=0;$i<sizeof($tab);$i++){
    echo get_class($tab[$i])." Area : ".$tab[$i]->getArea()."<br>";
}