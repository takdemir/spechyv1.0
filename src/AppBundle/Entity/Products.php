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
     * @var string
     */
    private $productName;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \AppBundle\Entity\Services
     */
    private $services;

    /**
     * @var \AppBundle\Entity\Services
     */
    private $serviceId;


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
     * Set slug
     *
     * @param string $slug
     *
     * @return Products
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
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

    /**
     * Set serviceId
     *
     * @param \AppBundle\Entity\Services $serviceId
     *
     * @return Products
     */
    public function setServiceId(\AppBundle\Entity\Services $serviceId = null)
    {
        $this->serviceId = $serviceId;

        return $this;
    }

    /**
     * Get serviceId
     *
     * @return \AppBundle\Entity\Services
     */
    public function getServiceId()
    {
        return $this->serviceId;
    }
}

