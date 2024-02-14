<?php

namespace App\Repository;

use App\Entity\ReponseBlog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReponseBlog>
 *
 * @method ReponseBlog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseBlog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseBlog[]    findAll()
 * @method ReponseBlog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseBlogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseBlog::class);
    }

//    /**
//     * @return ReponseBlog[] Returns an array of ReponseBlog objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReponseBlog
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
