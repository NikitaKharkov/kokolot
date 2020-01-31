<?php

namespace App\DataFixtures;

use App\Entity\Container;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use SplFileInfo;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerFixtures extends Fixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    /** @var ContainerInterface */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $publicFolder = $this->container->getParameter('kernel.project_dir').'/public';
        $containerImageFolder = $publicFolder.'/img/container/';

        $container = (new Container())
            ->setSize(100)
            ->setName('Ящик с бортами, открытый')
            ->setDescription('Какое-то описание')
            ->setImageUrl((new SplFileInfo($containerImageFolder.'/box-100.jpg'))->getRelativePath())
        ;

        $manager->persist($container);
        $this->setReference('box-100', $container);

        $container = (new Container())
            ->setSize(350)
            ->setName('Ящик стандартный')
            ->setDescription('Описание габаритов')
            ->setImageUrl((new SplFileInfo($containerImageFolder.'/box-350.jpg'))->getRelativePath())
        ;

        $manager->persist($container);
        $this->setReference('box-350', $container);

        $container = (new Container())
            ->setSize(500)
            ->setName('Ящик стандарт-2')
            ->setDescription('Описание габаритов')
            ->setImageUrl((new SplFileInfo($containerImageFolder.'/box-500.jpg'))->getRelativePath())
        ;

        $manager->persist($container);
        $this->setReference('box-500', $container);

        $manager->flush();

    }

    public function getOrder()
    {
        return 10;
    }
}
