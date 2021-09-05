<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    //allow to find product by their ranked (not yet included)
    public function tendance(): array
    {
        return $this->createQueryBuilder('p')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY)
        ;
    }

    //get a list of product by idCategory
    public function getProductsByCategory($value): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.idcategory = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY)
        ;
    }

    //chercher un produit dans la barre de recherche
    public function searchProduct($value)
    {
        $object = $this->createQueryBuilder('p')
            ->leftjoin('p.idcategory', "c");

        if (!is_null($value['searchText']) || empty($value['categories'])) {
            $object->andWhere('p.nameproduct LIKE :val')
            ->setParameter('val', '%'.$value['searchText'].'%');
        };

        if (!is_null($value['categories'])) {
            $object->andWhere('c IN (:nameCat)')
            ->setParameter('nameCat', $value['categories']);
        };

      /* dump($object->getQuery()->getSQL()); */
        return $object->getQuery()->getResult();
    }

    public function searchProductsByName(string $query)
    {

        $qb = $this->createQueryBuilder('p');
        
        $qb->where(
            $qb->expr()->andX(
                $qb->expr()->orX(
                    $qb->expr()->like('p.nameproduct', ':query')
                )
            )
        )
            ->setParameter('query', '%' . $query . '%');
            
        return $qb->getQuery()->getResult();
    }

}
