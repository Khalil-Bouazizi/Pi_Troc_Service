<?php

namespace App\Repository;

use App\Entity\DonArgent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DonArgent>
 *
 * @method DonArgent|null find($id, $lockMode = null, $lockVersion = null)
 * @method DonArgent|null findOneBy(array $criteria, array $orderBy = null)
 * @method DonArgent[]    findAll()
 * @method DonArgent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonArgentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DonArgent::class);
    }

//    /**
//     * @return DonArgent[] Returns an array of DonArgent objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DonArgent
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
