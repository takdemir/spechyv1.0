<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
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
     * @Assert\NotBlank(message= "products.name.not_blank")
     */
    private $productName;

    /**
     * @var integer
     */
    private $visible;

    /**
     * @var string
     * @Assert\NotBlank(message= "products.slug.not_blank")
     */
    private $slug;

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
}

