<?php

class Animal
{
    public function sound()
    {
        echo "the animal is making sound <br>";
    }
}


class Dog extends Animal
{
    public function sound()
    {
        echo "the dog is barking <br>";
    }
}

class Cat extends Animal
{
    public function sound()
    {
        echo "the cat is meowing <br>";
    }
}

$dog = new Dog;
$cat = new Cat;
$cat -> sound();
$dog -> sound();


?>