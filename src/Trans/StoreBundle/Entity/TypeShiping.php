<?php
// src/Trans/StoreBundle/Entity/TypeShiping.php
namespace Trans\StoreBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="TypeShiping")
 */
class TypeShiping
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
    protected $type_shiping;
    
    
     /**
     * @ORM\OneToMany(targetEntity="TransportLog", mappedBy="type_shiping")
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
     * Set type_shiping
     *
     * @param string $typeShiping
     * @return TypeShiping
     */
    public function setTypeShiping($typeShiping)
    {
        $this->type_shiping = $typeShiping;
    
        return $this;
    }

    /**
     * Get type_shiping
     *
     * @return string 
     */
    public function getTypeShiping()
    {
        return $this->type_shiping;
    }
}