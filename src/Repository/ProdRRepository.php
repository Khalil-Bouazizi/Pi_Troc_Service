<?php

namespace App\Repository;

use App\Entity\ProdR;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProdR>
 *
 * @method ProdR|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProdR|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProdR[]    findAll()
 * @method ProdR[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProdRRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProdR::class);
    }

//    /**
//     * @return ProdR[] Returns an array of ProdR objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProdR
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
