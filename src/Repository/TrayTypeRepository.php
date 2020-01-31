<?php

namespace App\Repository;

use App\Entity\Tray;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tray|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tray|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tray[]    findAll()
 * @method Tray[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrayTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tray::class);
    }

    // /**
    //  * @return TrayType[] Returns an array of TrayType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TrayType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
