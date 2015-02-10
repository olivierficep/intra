<?php

namespace Ficep\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Machine
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ficep\PlanningBundle\Entity\MachineRepository")
 */
class Machine
{
	/**
	 * @ORM\ManyToOne(targetEntity="Ficep\PlanningBundle\Entity\Custommer", inversedBy="machines")
	 */
	 
	 private $custommers;
	
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="mat", type="string", length=255)
     */
    private $mat;


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
     * Set type
     *
     * @param string $type
     * @return Machine
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set mat
     *
     * @param string $mat
     * @return Machine
     */
    public function setMat($mat)
    {
        $this->mat = $mat;
    
        return $this;
    }

    /**
     * Get mat
     *
     * @return string 
     */
    public function getMat()
    {
        return $this->mat;
    }

    /**
     * Set custommers
     *
     * @param \Ficep\PlanningBundle\Entity\Custommer $custommers
     * @return Machine
     */
    public function setCustommers(\Ficep\PlanningBundle\Entity\Custommer $custommers = null)
    {
        $this->custommers = $custommers;
    
        return $this;
    }

    /**
     * Get custommers
     *
     * @return \Ficep\PlanningBundle\Entity\Custommer 
     */
    public function getCustommers()
    {
        return $this->custommers;
    }
}
