<?php

namespace iia\ApiBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use iia\ApiBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface
{
  /**
   * @var ContainerInterface
   */
  private $container;

  /**
   * {@inheritDoc}
   */
  public function setContainer(ContainerInterface $container = null)
  {
    $this->container = $container;
  }

  public function load(ObjectManager $em)
  {
    // Get our userManager, you must implement `ContainerAwareInterface`
    $userManager = $this->container->get('fos_user.user_manager');

    // Create our user and set details
    $user = $userManager->createUser();
    $user->setLogin('tata');
    $user->setPassword("password");
    $user->setName("name");
    $user->setFirstName("firstname");
    $user->setmail('email@domain.com');
    $id = 1;
    //$user->setEnabled(true);
    //$user->setRoles(array('ROLE_ADMIN'));
    // Update the user
    //$userManager->updateUser($id);
    $em->persist($user);
    $em->flush();
  }
}