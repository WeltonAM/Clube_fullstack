<?php

abstract class VehicleFactory
{
    abstract public function getVehicle();
}

class ScooterFactory extends VehicleFactory
{
    public function getVehicle()
    {
        return new Scooter(); 
    }
}

class BikeFactory extends VehicleFactory
{
    public function getVehicle()
    {
        return new Bike(); 
    }
}

interface Ifactory
{
    public function drive();
}

class Scooter implements Ifactory
{
    public function drive()
    {
        return 'Driving the Scooter';
    }
    
}

class Bike implements Ifactory
{
    public function drive()
    {
        return 'Driving the Bike';
    }   
}

$factory = new ScooterFactory;
$instance = $factory->getVehicle();
var_dump($instance);