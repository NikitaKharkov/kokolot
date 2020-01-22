<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ProductFixtures extends Fixture implements ContainerAwareInterface
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
        $faker = Factory::create('ru_RU');

        $publicFolder = $this->container->getParameter('kernel.project_dir').'/public';
        $imagesFolder = '/img/product/';

        $f = new Finder();
        $images = $f->in($publicFolder.$imagesFolder)->files();

        /** @var SplFileInfo $image */
        foreach ($images as $image) {
            $imagesUrls[] = $imagesFolder.$image->getRelativePathname();
        }

        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setName($faker->realText(50));
            $product->setDescription($faker->paragraph(5, true));
        }
    }
}
