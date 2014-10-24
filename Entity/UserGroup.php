<?php
/**
 * Created by PhpStorm.
 * User: marieke
 * Date: 24/10/14
 * Time: 09:19
 */

namespace Xio\Bundle\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserGroup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="User", inversedBy="groups")
     */
    private $users;

    function __construct($name)
    {
        $this->setName($name);
        $this->users = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        $this->users[] = $user;
    }
} 