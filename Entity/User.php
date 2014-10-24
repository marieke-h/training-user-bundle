<?php
/**
 * Created by PhpStorm.
 * User: marieke
 * Date: 23/10/14
 * Time: 17:13
 */

namespace Xio\Bundle\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\ManyToMany(targetEntity="UserGroup", mappedBy="users")
     */
    private $groups;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->groups = new ArrayCollection();
    }


    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getGroups()
    {
        return $this->groups;
    }

    public function addGroup(UserGroup $group) {
        $group->addUser($this);
        $this->groups[] = $group;
    }
} 