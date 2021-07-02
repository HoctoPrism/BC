<?php

namespace App\Repository;

use App\Entity\Useraccount;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Useraccount|null find($id, $lockMode = null, $lockVersion = null)
 * @method Useraccount|null findOneBy(array $criteria, array $orderBy = null)
 * @method Useraccount[]    findAll()
 * @method Useraccount[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UseraccountRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Useraccount::class);
    }

    // /**
    //  * @return Useraccount[] Returns an array of Useraccount objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Useraccount
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
