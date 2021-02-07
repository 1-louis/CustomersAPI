<?php

namespace App\Repository;

use App\Entity\customers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method customers|null find($id, $lockMode = null, $lockVersion = null)
 * @method customers|null findOneBy(array $criteria, array $orderBy = null)
 * @method customers[]    findAll()
 * @method customers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EffectifRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, customers::class);
    }

    // /**
    //  * @return customers[] Returns an array of customers objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?customers
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
