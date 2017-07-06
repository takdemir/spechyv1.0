<?php

namespace AppBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Admin
 */
class Admin implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $isCustomer;

    /**
     * @var string
     * @Assert\NotBlank(message= "admin.name.not_blank")
     */
    private $name;

    /**
     * @var string
     * @Assert\NotBlank(message= "admin.username.not_blank")
     */
    private $username;

    /**
     * @var string
     * @Assert\NotBlank(message= "admin.password.not_blank")
     * @Assert\Regex(
     *     pattern="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).{8,20}$/",
     *     match=true,
     *     message="admin.password.needed"
     * )
     */
    private $password;

    /**
     * @var string
     */
    private $roles;

    /**
     * @var string
     * @Assert\Email(message = "admin.individual.email")
     */
    private $email;

    /**
     * @Assert\NotBlank()
     * @Assert\Regex(
     *     pattern="/^\d{10,11}$/",
     *     match=true,
     *     message="admin.phone.needed"
     * )
     */
    private $phone;

    /**
     * @var \DateTime
     */
    private $lastentrance;


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
     * Set isCustomer
     *
     * @param integer $isCustomer
     *
     * @return Admin
     */
    public function setisCustomer($isCustomer)
    {
        $this->isCustomer = $isCustomer;

        return $this;
    }

    /**
     * Get isCustomer
     *
     * @return integer
     */
    public function getisCustomer()
    {
        return $this->isCustomer;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Admin
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * Set username
     *
     * @param string $username
     *
     * @return Admin
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Admin
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return Admin
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return array($this->roles);
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Admin
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Admin
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set lastentrance
     *
     * @param \DateTime $lastentrance
     *
     * @return Admin
     */
    public function setLastentrance($lastentrance)
    {
        $this->lastentrance = $lastentrance;

        return $this;
    }

    /**
     * Get lastentrance
     *
     * @return \DateTime
     */
    public function getLastentrance()
    {
        return $this->lastentrance;
    }

    public function serialize()
    {
        return serialize(array($this->id,$this->name,$this->username,$this->roles));
    }

    public function unserialize($serialized)
    {
        list($this->id,$this->name,$this->username,$this->roles)=unserialize($serialized);
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
