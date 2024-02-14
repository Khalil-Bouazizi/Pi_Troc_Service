<?php

namespace App\Repository;

use App\Entity\ProduitTroc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitTroc>
 *
 * @method ProduitTroc|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitTroc|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitTroc[]    findAll()
 * @method ProduitTroc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitTrocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitTroc::class);
    }

//    /**
//     * @return ProduitTroc[] Returns an array of ProduitTroc objects
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

//    public function findOneBySomeField($value): ?ProduitTroc
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
