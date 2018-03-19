<?php

namespace ApiBundle\Entity;

use ApiBundle\Mixin\Labelisable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="flux_user")
 * @ORM\Entity
 */
class User implements UserInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @JMS\Groups({"getUsers"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25, unique=true)
     * @JMS\Groups({"getLogin","postUsers"})
     * @Assert\NotBlank(message="Un nom d'utilisateur est obligatoire")
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64)
     * @JMS\Groups({"postUsers"})
     * @JMS\Accessor(setter="setPassword")
     */
    private $password;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->favoris = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getSalt()
    {
        return null;
    }

    public function setPassword($pass) {
        $this->password = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 13]);

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getRoles()
    {
        return array('ROLE_USER');
    }

    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized);
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
