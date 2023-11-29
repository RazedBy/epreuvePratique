<?php

namespace App\Repository;

use App\Entity\Medicamen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Medicamen>
 *
 * @method Medicamen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicamen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicamen[]    findAll()
 * @method Medicamen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicamenRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medicamen::class);
    }

//    /**
//     * @return Medicamen[] Returns an array of Medicamen objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Medicamen
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
