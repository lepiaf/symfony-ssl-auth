<?php

namespace lepiaf\AppBundle\Security;

use Doctrine\ODM\MongoDB\DocumentManager;
use lepiaf\AppBundle\Document\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * Class UserProvider
 */
class UserProvider implements UserProviderInterface
{
    /**
     * @var DocumentManager
     */
    protected $manager;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        $user = $this->manager->getRepository('lepiafAppBundle:User')->findOneBy(['email' => $username]);

        if (!$user) {
            throw new UsernameNotFoundException("Cannot find user ".$username);
        }

        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {
        return $this->loadUserByUsername($user->getEmail());
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return $class === 'lepiaf\AppBundle\Document\User';
    }
}
