<?php

namespace lepiaf\AppBundle\Document;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * Class User
 * @MongoDB\Document()
 */
class User implements UserInterface
{

    /**
     * @var string
     * @MongoDB\Id()
     */
    protected $id;

    /**
     * @var string
     * @MongoDB\String()
     */
    protected $commonName;

    /**
     * @var string
     * @MongoDB\String()
     */
    protected $email;

    /**
     * @return string
     */
    public function getCommonName()
    {
        return $this->commonName;
    }

    /**
     * @param string $commonName
     */
    public function setCommonName($commonName)
    {
        $this->commonName = $commonName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return ["ROLE_ADMIN"];
    }

    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->commonName;
    }

    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        return;
    }

    public function __toString()
    {
        return $this->commonName;
    }
}
