<?php

abstract class Vehicle
{
    abstract function start();

    public function show()
    {
        echo "show";
    }
}

class Car extends Vehicle
{
    public function start()
    {
        echo "the car starts with a button";
    }
}
class bike extends Vehicle
{
    public function start()
    {
        echo "the bike starts with a kick";
    }
}


?>