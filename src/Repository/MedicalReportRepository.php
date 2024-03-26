<?php

namespace App\Repository;

use App\Entity\MedicalReport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MedicalReport>
 *
 * @method MedicalReport|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicalReport|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicalReport[]    findAll()
 * @method MedicalReport[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicalReportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicalReport::class);
    }

//    /**
//     * @return MedicalReport[] Returns an array of MedicalReport objects
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

//    public function findOneBySomeField($value): ?MedicalReport
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
