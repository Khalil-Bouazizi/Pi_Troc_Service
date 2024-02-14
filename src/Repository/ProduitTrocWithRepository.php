<?php

namespace App\Repository;

use App\Entity\ProduitTrocWith;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitTrocWith>
 *
 * @method ProduitTrocWith|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitTrocWith|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitTrocWith[]    findAll()
 * @method ProduitTrocWith[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitTrocWithRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitTrocWith::class);
    }

//    /**
//     * @return ProduitTrocWith[] Returns an array of ProduitTrocWith objects
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

//    public function findOneBySomeField($value): ?ProduitTrocWith
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
