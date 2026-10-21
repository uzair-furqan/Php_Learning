<?php

class Car
{
    public $name;
    protected $price;

    public function set_name($set_name)
    {
        $this->name = $set_name;  //setter
    }
    public function get_name()
    {
        return $this->name; //getter
    }
}

class Honda extends Car
{
    public function set_price($set_price)
    {
        $this -> price = $set_price;
    }

    public function get_price()
    {
        return $this->price;
    }
}



$newCar = new Car();

$newCar->set_name("hilux");
echo $newCar->get_name();

$myhonda = new Honda();

$myhonda -> set_price(200000);
echo $myhonda -> get_price();




?>