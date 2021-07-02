<?php

namespace App\Repository;

use App\Entity\Imageproduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Imageproduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method Imageproduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method Imageproduct[]    findAll()
 * @method Imageproduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageproductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Imageproduct::class);
    }

    // /**
    //  * @return Imageproduct[] Returns an array of Imageproduct objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Imageproduct
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
