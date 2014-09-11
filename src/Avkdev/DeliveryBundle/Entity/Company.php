<?php

namespace Avkdev\DeliveryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 */
class Company
{

    const DATA_SOURCE_DATABASE = 'database';
    const DATA_SOURCE_API = 'api';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $dataSource;

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getId() . ' ' . $this->getName();
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
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get dataSource
     *
     * @return string
     */
    public function getDataSource()
    {
        return $this->dataSource;
    }

    /**
     * Set dataSource
     *
     * @param string $dataSource
     * @return Company
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;
        return $this;
    }
    /**
     * @var string
     */
    private $apiClass;


    /**
     * Set apiClass
     *
     * @param string $apiClass
     * @return Company
     */
    public function setApiClass($apiClass)
    {
        $this->apiClass = $apiClass;

        return $this;
    }

    /**
     * Get apiClass
     *
     * @return string 
     */
    public function getApiClass()
    {
        return $this->apiClass;
    }
}
