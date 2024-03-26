<?php

namespace App\Repository;

use App\Entity\TypeOfActs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeOfActs>
 *
 * @method TypeOfActs|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeOfActs|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeOfActs[]    findAll()
 * @method TypeOfActs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeOfActsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeOfActs::class);
    }

    //    /**
    //     * @return TypeOfActs[] Returns an array of TypeOfActs objects
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

    //    public function findOneBySomeField($value): ?TypeOfActs
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
