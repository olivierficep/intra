<?php

namespace Ficep\PlanningBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ficep\PlanningBundle\Entity\EventRepository")
 */
class Event
{
	
	/**
	 * @ORM\ManyToOne(targetEntity="Ficep\PlanningBundle\Entity\Technician")
	 * @ORM\JoinColumn(nullable=false)
	 */
	 
	 private $technicians;
	 
	 /**
	 * @ORM\ManyToOne(targetEntity="Ficep\PlanningBundle\Entity\Custommer")
	 * @ORM\JoinColumn(nullable=false)
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
     * @var \string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="duration", type="integer")
     */
    private $duration;


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
     * Set name
     *
     * @param \DateTime $name
     * @return Event
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return \DateTime 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Event
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
     * Set duration
     *
     * @param integer $duration
     * @return Event
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return integer 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set technicians
     *
     * @param \Ficep\PlanningBundle\Entity\Technician $technicians
     * @return Event
     */
    public function setTechnicians(\Ficep\PlanningBundle\Entity\Technician $technicians)
    {
        $this->technicians = $technicians;
    
        return $this;
    }

    /**
     * Get technicians
     *
     * @return \Ficep\PlanningBundle\Entity\Technician 
     */
    public function getTechnicians()
    {
        return $this->technicians;
    }

    /**
     * Set custommers
     *
     * @param \Ficep\PlanningBundle\Entity\Custommer $custommers
     * @return Event
     */
    public function setCustommers(\Ficep\PlanningBundle\Entity\Custommer $custommers)
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
