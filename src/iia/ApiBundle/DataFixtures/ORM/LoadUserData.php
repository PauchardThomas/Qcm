<?php
namespace Ens\ApiBundle\DataFixtures\ORM;

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
        $user->setLogin('admin');
        $user->setPassword('admin');
        $user->setName('Name');
        $user->setFirstName('FirstName');
        $user->setMail('mail@mail.fr');


        // Update the user
        $userManager->updateUser($user, true);
    }
}