<?php

namespace App\Repository;

use App\Entity\UserMedicalReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserMedicalReport>
 *
 * @method UserMedicalReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMedicalReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMedicalReport[]    findAll()
 * @method UserMedicalReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMedicalReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserMedicalReport::class);
    }

    //    /**
    //     * @return UserMedicalReport[] Returns an array of UserMedicalReport objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('u.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?UserMedicalReport
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
