<?php

namespace App\Repository;

use App\Entity\TrayType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TrayType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TrayType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TrayType[]    findAll()
 * @method TrayType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrayTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TrayType::class);
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
