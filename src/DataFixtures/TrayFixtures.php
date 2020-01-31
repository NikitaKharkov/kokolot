<?php

namespace App\DataFixtures;

use App\Entity\Tray;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use SplFileInfo;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class TrayFixtures extends Fixture implements ContainerAwareInterface, OrderedFixtureInterface
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
        $trayImageFolder = $publicFolder.'/img/tray/';

        $tray = (new Tray())
            ->setName('Десятка')
            ->setProductType('Куриное яйцо')
            ->setRetailPrice('120')
            ->setWholeSalePrice('110')
            ->setSize(10)
            ->setImageUrl(json_encode([
                (new SplFileInfo($trayImageFolder.'/10/main.jpg'))->getRelativePath(),
                (new SplFileInfo($trayImageFolder.'/10/front.jpg'))->getRelativePath(),
                (new SplFileInfo($trayImageFolder.'/10/top.jpg'))->getRelativePath(),
            ]))
            ->addContainer($this->getReference('box-100'))
            ->addContainer($this->getReference('box-350'))
            ->addContainer($this->getReference('box-500'))
        ;

        $manager->persist($tray);

        $tray = (new Tray())
            ->setName('Двадцатка')
            ->setProductType('Перепелиное яйцо')
            ->setRetailPrice('250')
            ->setWholeSalePrice('230')
            ->setSize(20)
            ->setImageUrl(json_encode([
                (new SplFileInfo($trayImageFolder.'/20/main.jpg'))->getRelativePath(),
                (new SplFileInfo($trayImageFolder.'/20/top-with-eggs.jpg'))->getRelativePath(),
                (new SplFileInfo($trayImageFolder.'/20/top.jpg'))->getRelativePath(),
            ]))
            ->addContainer($this->getReference('box-100'))
            ->addContainer($this->getReference('box-350'))
            ->addContainer($this->getReference('box-500'))
        ;

        $manager->persist($tray);

    }

    public function getOrder()
    {
        return 20;
    }
}
