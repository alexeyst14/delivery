<?php

namespace Avkdev\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pricelist
 */
class Pricelist
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $size;

    /**
     * @var float
     */
    private $weight;

    /**
     * @var float
     */
    private $parcelCost;

    /**
     * @var float
     */
    private $cost;

    /**
     * @var \Avkdev\DeliveryBundle\Entity\Company
     */
    private $company;


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
     * Set size
     *
     * @param float $size
     * @return Pricelist
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return float 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set weight
     *
     * @param float $weight
     * @return Pricelist
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return float 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set parcelCost
     *
     * @param float $parcelCost
     * @return Pricelist
     */
    public function setParcelCost($parcelCost)
    {
        $this->parcelCost = $parcelCost;

        return $this;
    }

    /**
     * Get parcelCost
     *
     * @return float 
     */
    public function getParcelCost()
    {
        return $this->parcelCost;
    }

    /**
     * Set cost
     *
     * @param float $cost
     * @return Pricelist
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set company
     *
     * @param \Avkdev\DeliveryBundle\Entity\Company $company
     * @return Pricelist
     */
    public function setCompany(\Avkdev\DeliveryBundle\Entity\Company $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Avkdev\DeliveryBundle\Entity\Company 
     */
    public function getCompany()
    {
        return $this->company;
    }
}
