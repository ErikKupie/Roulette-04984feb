<?php
class Wheel
{
    private $roll;

    public function __construct()
    {
        $roll = $this->roll();
        $this->roll = $roll;
    }

    public function getRoll(){
        return $this->roll;
    }

    private function roll()
    {
        $color = rand(1, 2); // 1 = red, 2 = black
        $number = rand(0, 36);
        return [$number, $color];
    }
}