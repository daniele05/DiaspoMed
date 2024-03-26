<?php

namespace App\Repository;

use App\Entity\PatientUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PatientUser>
 *
 * @method PatientUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatientUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatientUser[]    findAll()
 * @method PatientUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatientUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatientUser::class);
    }

    //    /**
    //     * @return PatientUser[] Returns an array of PatientUser objects
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

    //    public function findOneBySomeField($value): ?PatientUser
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
