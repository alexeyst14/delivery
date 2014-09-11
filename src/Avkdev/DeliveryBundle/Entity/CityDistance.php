<?php

namespace Avkdev\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CityDistance
 */
class CityDistance
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $costIdx;

    /**
     * @var \Avkdev\DeliveryBundle\Entity\City
     */
    private $departureCity;

    /**
     * @var \Avkdev\DeliveryBundle\Entity\City
     */
    private $arrivalCity;


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
     * Set costIdx
     *
     * @param float $costIdx
     * @return CityDistance
     */
    public function setCostIdx($costIdx)
    {
        $this->costIdx = $costIdx;

        return $this;
    }

    /**
     * Get costIdx
     *
     * @return float 
     */
    public function getCostIdx()
    {
        return $this->costIdx;
    }

    /**
     * Set departureCity
     *
     * @param \Avkdev\DeliveryBundle\Entity\City $departureCity
     * @return CityDistance
     */
    public function setDepartureCity(\Avkdev\DeliveryBundle\Entity\City $departureCity = null)
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    /**
     * Get departureCity
     *
     * @return \Avkdev\DeliveryBundle\Entity\City 
     */
    public function getDepartureCity()
    {
        return $this->departureCity;
    }

    /**
     * Set arrivalCity
     *
     * @param \Avkdev\DeliveryBundle\Entity\City $arrivalCity
     * @return CityDistance
     */
    public function setArrivalCity(\Avkdev\DeliveryBundle\Entity\City $arrivalCity = null)
    {
        $this->arrivalCity = $arrivalCity;

        return $this;
    }

    /**
     * Get arrivalCity
     *
     * @return \Avkdev\DeliveryBundle\Entity\City 
     */
    public function getArrivalCity()
    {
        return $this->arrivalCity;
    }
    /**
     * @var integer
     */
    private $deliveryTime;


    /**
     * Set deliveryTime
     *
     * @param integer $deliveryTime
     * @return CityDistance
     */
    public function setDeliveryTime($deliveryTime)
    {
        $this->deliveryTime = $deliveryTime;

        return $this;
    }

    /**
     * Get deliveryTime
     *
     * @return integer 
     */
    public function getDeliveryTime()
    {
        return $this->deliveryTime;
    }
}
