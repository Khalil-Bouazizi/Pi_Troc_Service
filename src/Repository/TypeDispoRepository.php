<?php

namespace App\Repository;

use App\Entity\TypeDispo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeDispo>
 *
 * @method TypeDispo|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDispo|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDispo[]    findAll()
 * @method TypeDispo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDispoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeDispo::class);
    }

//    /**
//     * @return TypeDispo[] Returns an array of TypeDispo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeDispo
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
