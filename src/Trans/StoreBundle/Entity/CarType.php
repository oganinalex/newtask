<?php
// src/Trans/StoreBundle/Entity/CarType.php
namespace Trans\StoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="CarType")
 */
class CarType
{
    
    
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $car_name;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $car_number;

    /**
     * @ORM\Column(type="string", length=100)
     */
    
    
    protected $car_vincode;
     /**
     * @ORM\Column(type="string", length=100, nullable=true )
     */
    protected $driver_first_name;
     /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $driver_last_name;
     /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $location;
     /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    protected $foto;
    
    
    /**
     * @ORM\OneToMany(targetEntity="TransportLog", mappedBy="car_type")
     */
    protected $transportlog;

    public function __construct()
    {
        $this->transportlog = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set car_name
     *
     * @param string $carName
     * @return CarType
     */
    public function setCarName($carName)
    {
        $this->car_name = $carName;
    
        return $this;
    }

    /**
     * Get car_name
     *
     * @return string 
     */
    public function getCarName()
    {
        return $this->car_name;
    }

    /**
     * Set car_number
     *
     * @param string $carNumber
     * @return CarType
     */
    public function setCarNumber($carNumber)
    {
        $this->car_number = $carNumber;
    
        return $this;
    }

    /**
     * Get car_number
     *
     * @return string 
     */
    public function getCarNumber()
    {
        return $this->car_number;
    }

    /**
     * Set car_vincode
     *
     * @param string $carVincode
     * @return CarType
     */
    public function setCarVincode($carVincode)
    {
        $this->car_vincode = $carVincode;
    
        return $this;
    }

    /**
     * Get car_vincode
     *
     * @return string 
     */
    public function getCarVincode()
    {
        return $this->car_vincode;
    }

    /**
     * Set driver_first_name
     *
     * @param string $driverFirstName
     * @return CarType
     */
    public function setDriverFirstName($driverFirstName)
    {
        $this->driver_first_name = $driverFirstName;
    
        return $this;
    }

    /**
     * Get driver_first_name
     *
     * @return string 
     */
    public function getDriverFirstName()
    {
        return $this->driver_first_name;
    }

    /**
     * Set driver_last_name
     *
     * @param string $driverLastName
     * @return CarType
     */
    public function setDriverLastName($driverLastName)
    {
        $this->driver_last_name = $driverLastName;
    
        return $this;
    }

    /**
     * Get driver_last_name
     *
     * @return string 
     */
    public function getDriverLastName()
    {
        return $this->driver_last_name;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return CarType
     */
    public function setLocation($location)
    {
        $this->location = $location;
    
        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set foto
     *
     * @param string $foto
     * @return CarType
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    
        return $this;
    }

    /**
     * Get foto
     *
     * @return string 
     */
    public function getFoto()
    {
        return $this->foto;
    }
}