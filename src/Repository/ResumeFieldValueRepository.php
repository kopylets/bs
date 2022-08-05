<?php

namespace App\Repository;

use App\Entity\ResumeFieldValue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResumeFieldValue>
 *
 * @method ResumeFieldValue|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResumeFieldValue|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResumeFieldValue[]    findAll()
 * @method ResumeFieldValue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResumeFieldValueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResumeFieldValue::class);
    }

    public function add(ResumeFieldValue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResumeFieldValue $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ResumeFieldValue[] Returns an array of ResumeFieldValue objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('w.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ResumeFieldValue
//    {
//        return $this->createQueryBuilder('w')
//            ->andWhere('w.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
