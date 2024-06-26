<?php

namespace App\Repository;

use App\Entity\UserSpeciality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserSpeciality>
 *
 * @method UserSpeciality|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSpeciality|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSpeciality[]    findAll()
 * @method UserSpeciality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSpecialityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserSpeciality::class);
    }

    //    /**
    //     * @return UserSpeciality[] Returns an array of UserSpeciality objects
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

    //    public function findOneBySomeField($value): ?UserSpeciality
    //    {
    //        return $this->createQueryBuilder('u')
    //            ->andWhere('u.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
