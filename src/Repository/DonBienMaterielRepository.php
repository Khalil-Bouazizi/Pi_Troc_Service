<?php

namespace App\Repository;

use App\Entity\DonBienMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DonBienMateriel>
 *
 * @method DonBienMateriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method DonBienMateriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method DonBienMateriel[]    findAll()
 * @method DonBienMateriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonBienMaterielRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DonBienMateriel::class);
    }

//    /**
//     * @return DonBienMateriel[] Returns an array of DonBienMateriel objects
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

//    public function findOneBySomeField($value): ?DonBienMateriel
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
