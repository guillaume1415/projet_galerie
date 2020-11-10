<?php

namespace App\Repository;

use App\Entity\GalleryHasUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GalleryHasUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method GalleryHasUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method GalleryHasUser[]    findAll()
 * @method GalleryHasUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GalleryHasUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GalleryHasUser::class);
    }

    // /**
    //  * @return GalleryHasUser[] Returns an array of GalleryHasUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GalleryHasUser
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
