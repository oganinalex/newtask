<?php

// src/Trans/CarTypeTask/Entity/CarTypeTask.php
namespace Trans\TaskBundle\Entity;

class CarTypeTask
{
    protected $car_name;

    protected $car_number;
    
    protected $car_vincode;
    
    protected $driver_first_name;
    
    protected $driver_last_name;
    
    protected $location;
    
    protected $foto;
    

    public function getCarName()
    {
        return $this->car_name;
    }
    public function setCarName($car_name)
    {
        $this->car_name = $car_name;
    }
    
    public function getCarNumber()
    {
        return $this->car_number;
    }
    public function setCarNumber($car_number)
    {
        $this->car_number = $car_number;
    }
    public function getCarVincode()
    {
        return $this->car_vincode;
    }
    public function setCarVincode($car_vincode)
    {
        $this->car_vincode = $car_vincode;
    }
    public function getDriverFirstName()
    {
        return $this->driver_first_name;
    }
    public function setDriverFirstName($driver_first_name)
    {
        $this->driver_first_name = $driver_first_name;
    }
    public function getDriverLastName()
    {
        return $this->driver_last_name;
    }
    public function setDriverLastName($driver_last_name)
    {
        $this->driver_last_name = $driver_last_name;
    }
    public function getLocation()
    {
        return $this->location;
    }
    public function setLocation($location)
    {
        $this->location = $location;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    
    


}

?>
