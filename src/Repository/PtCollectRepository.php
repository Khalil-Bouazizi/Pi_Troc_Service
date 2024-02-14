<?php

namespace App\Repository;

use App\Entity\PtCollect;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PtCollect>
 *
 * @method PtCollect|null find($id, $lockMode = null, $lockVersion = null)
 * @method PtCollect|null findOneBy(array $criteria, array $orderBy = null)
 * @method PtCollect[]    findAll()
 * @method PtCollect[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PtCollectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PtCollect::class);
    }

//    /**
//     * @return PtCollect[] Returns an array of PtCollect objects
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

//    public function findOneBySomeField($value): ?PtCollect
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
