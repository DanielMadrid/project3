<?php
// src/Acme/UserBundle/Entity/User.php

namespace Blog\DaniBlogBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *        min = 3,
     *        max = 255,
     *        minMessage = "Your name must have at least {{ limit }} characters",
     *        minMessage = "Your name can't have more than {{ limit }} characters"
     * )
     */
    protected $name;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}