<?php

namespace AppBundle\Entity;

/**
 * Products
 */
class Products
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $serviceId;

    /**
     * @var string
     */
    private $productName;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var \AppBundle\Entity\Services
     */
    private $services;


    /**
     * Get id
     *
     * @return integer
     */
    public function getid()
    {
        return $this->id;
    }

    /**
     * Set serviceId
     *
     * @param integer $serviceId
     *
     * @return Products
     */
    public function setServiceId($serviceId)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return integer
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     *
     * @return Products
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set services
     *
     * @param \AppBundle\Entity\Services $services
     *
     * @return Products
     */
    public function setServices(\AppBundle\Entity\Services $services = null)
    {
        $this->services = $services;

        return $this;
    }

    /**
     * Get services
     *
     * @return \AppBundle\Entity\Services
     */
    public function getServices()
    {
        return $this->services;
    }
}

