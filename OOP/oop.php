<?php

//Object oriented programming

class Car{

    public $car_company;  // this is a property
    public $car_name;  // this is a property
    public $car_engine;  // this is a property
    public $car_color;  // this is a property


    public function set_car_name($set_car_name , $set_car_company)
    {
        $this->car_name = $set_car_name;
        $this->car_company = $set_car_company;   //setter is the method which set hte property value
    }

    public function get_car_name()
    {
        return $this->car_name;  //getter is the methods which gets the property
    }


}

$my_car = new Car();  // syntax to create object

$my_car -> set_car_name("crown" , "toyota");
echo $my_car-> car_company;
echo $my_car-> get_car_name();



?>