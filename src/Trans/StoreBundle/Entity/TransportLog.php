<?php
// src/Trans/StoreBundle/Entity/TransportLog.php
namespace Trans\StoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="TransportLog")
 */
class TransportLog
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
    protected $act_number;

    /**
     * @ORM\Column(type="integer")
     */
    protected $car_type_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="CarType", inversedBy="transportlog")
     * @ORM\JoinColumn(name="car_type_id", referencedColumnName="id")
     */
    protected $car_type;

    /**
     * @ORM\Column(type="date")
     */
    protected $date;
    /**
     * @ORM\Column(type="integer")
     */
    protected $cargo_weight;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $cargo_type;
    /**
     * @ORM\Column(type="integer")
     */
    protected $type_shiping_id;
    
    /**
     * @ORM\ManyToOne(targetEntity="TypeShiping", inversedBy="transportlog")
     * @ORM\JoinColumn(name="type_shiping_id", referencedColumnName="id")
     */
    protected $type_shiping;
        
    /**
     * @ORM\Column(type="decimal", scale=2, nullable=true)
     */
    protected $price_by_km;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $dist;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $number_trips;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $price_by_one;
    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $place_loading;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $place_discharg;
    /**
     * @ORM\Column(type="integer")
     */
    protected $edit_time;
    

    
    public function getCarType()
    {
        return $this->car_type;
    }
    public function setCarType($car_type)
    {
        $this->car_type = $car_type;
    
        return $this;
    }
    public function getTypeShiping()
    {
        return $this->type_shiping;
    }
    public function setTypeShiping($type_shiping)
    {
        $this->type_shiping = $type_shiping;
    
        return $this;
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
     * Set act_number
     *
     * @param string $actNumber
     * @return TransportLog
     */
    public function setActNumber($actNumber)
    {
        $this->act_number = $actNumber;
    
        return $this;
    }

    /**
     * Get act_number
     *
     * @return string 
     */
    public function getActNumber()
    {
        return $this->act_number;
    }

    /**
     * Set car_type
     *
     * @param integer $carType
     * @return TransportLog
     */
    public function setCarTypeId($carType)
    {
        $this->car_type_id = $carType;
    
        return $this;
    }

    /**
     * Get car_type
     *
     * @return integer 
     */
    public function getCarTypeId()
    {
        return $this->car_type_id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return TransportLog
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set cargo_weight
     *
     * @param integer $cargoWeight
     * @return TransportLog
     */
    public function setCargoWeight($cargoWeight)
    {
        $this->cargo_weight = $cargoWeight;
    
        return $this;
    }

    /**
     * Get cargo_weight
     *
     * @return integer 
     */
    public function getCargoWeight()
    {
        return $this->cargo_weight;
    }

    /**
     * Set cargo_type
     *
     * @param string $cargoType
     * @return TransportLog
     */
    public function setCargoType($cargoType)
    {
        $this->cargo_type = $cargoType;
    
        return $this;
    }

    /**
     * Get cargo_type
     *
     * @return string 
     */
    public function getCargoType()
    {
        return $this->cargo_type;
    }

    /**
     * Set type_transposition
     *
     * @param integer $typeTransposition
     * @return TransportLog
     */
    public function setTypeShipingId($typeShiping)
    {
        $this->type_shiping_id = $typeShiping;
    
        return $this;
    }

    /**
     * Get type_transposition
     *
     * @return integer 
     */
    public function getTypeShipingId()
    {
        return $this->type_shiping_id;
    }

    /**
     * Set price_by_km
     *
     * @param float $priceByKm
     * @return TransportLog
     */
    public function setPriceByKm($priceByKm)
    {
        $this->price_by_km = $priceByKm;
    
        return $this;
    }

    /**
     * Get price_by_km
     *
     * @return float 
     */
    public function getPriceByKm()
    {
        return $this->price_by_km;
    }

    /**
     * Set dist
     *
     * @param integer $dist
     * @return TransportLog
     */
    public function setDist($dist)
    {
        $this->dist = $dist;
    
        return $this;
    }

    /**
     * Get dist
     *
     * @return integer 
     */
    public function getDist()
    {
        return $this->dist;
    }

    /**
     * Set number_trips
     *
     * @param integer $numberTrips
     * @return TransportLog
     */
    public function setNumberTrips($numberTrips)
    {
        $this->number_trips = $numberTrips;
    
        return $this;
    }

    /**
     * Get number_trips
     *
     * @return integer 
     */
    public function getNumberTrips()
    {
        return $this->number_trips;
    }

    /**
     * Set price_by_one
     *
     * @param integer $priceByOne
     * @return TransportLog
     */
    public function setPriceByOne($priceByOne)
    {
        $this->price_by_one = $priceByOne;
    
        return $this;
    }

    /**
     * Get price_by_one
     *
     * @return integer 
     */
    public function getPriceByOne()
    {
        return $this->price_by_one;
    }

    /**
     * Set place_loading
     *
     * @param string $placeLoading
     * @return TransportLog
     */
    public function setPlaceLoading($placeLoading)
    {
        $this->place_loading = $placeLoading;
    
        return $this;
    }

    /**
     * Get place_loading
     *
     * @return string 
     */
    public function getPlaceLoading()
    {
        return $this->place_loading;
    }

    /**
     * Set place_discharg
     *
     * @param string $placeDischarg
     * @return TransportLog
     */
    public function setPlaceDischarg($placeDischarg)
    {
        $this->place_discharg = $placeDischarg;
    
        return $this;
    }

    /**
     * Get place_discharg
     *
     * @return string 
     */
    public function getPlaceDischarg()
    {
        return $this->place_discharg;
    }

    /**
     * Set edit_time
     *
     * @param \DateTime $editTime
     * @return TransportLog
     */
    public function setEditTime($editTime)
    {
        $this->edit_time = $editTime;
    
        return $this;
    }

    /**
     * Get edit_time
     *
     * @return \DateTime 
     */
    public function getEditTime()
    {
        return $this->edit_time;
    }
}