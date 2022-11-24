<?php

namespace App\Repository;

use App\Entity\ChildrenPer1000;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ChildrenPer1000|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChildrenPer1000|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChildrenPer1000[]    findAll()
 * @method ChildrenPer1000[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * This will suppress BooleanArgumentFlag
 * warnings in this class
 *
 * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
 */
class ChildrenPer1000Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChildrenPer1000::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ChildrenPer1000 $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ChildrenPer1000 $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ChildrenPer1000[] Returns an array of ChildrenPer1000 objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChildrenPer1000
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
