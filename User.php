<?php

class User{

    private $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __set($property, $value){
        if(property_exists($this, $property)){
            $this->$property = $value;
        }
    }

    public function __get($property){
        if(property_exists($this, $property)){
            return $property = $this->$property;
        }
    }
}