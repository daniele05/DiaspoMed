<?php

namespace App\Repository;

use App\Entity\DoctorUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DoctorUser>
 *
 * @method DoctorUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctorUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctorUser[]    findAll()
 * @method DoctorUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctorUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctorUser::class);
    }

    //    /**
    //     * @return DoctorUser[] Returns an array of DoctorUser objects
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

    //    public function findOneBySomeField($value): ?DoctorUser
    //    {
    //        return $this->createQueryBuilder('d')
    //            ->andWhere('d.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
