<?php

namespace App\Repository;

use App\Entity\HuertoProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HuertoProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method HuertoProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method HuertoProducto[]    findAll()
 * @method HuertoProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HuertoProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HuertoProducto::class);
    }

    // /**
    //  * @return HuertoProducto[] Returns an array of HuertoProducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HuertoProducto
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
