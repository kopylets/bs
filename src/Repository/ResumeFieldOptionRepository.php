<?php

namespace App\Repository;

use App\Entity\ResumeFieldOption;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ResumeFieldOption>
 *
 * @method ResumeFieldOption|null find($id, $lockMode = null, $lockVersion = null)
 * @method ResumeFieldOption|null findOneBy(array $criteria, array $orderBy = null)
 * @method ResumeFieldOption[]    findAll()
 * @method ResumeFieldOption[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResumeFieldOptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ResumeFieldOption::class);
    }

    public function add(ResumeFieldOption $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ResumeFieldOption $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ResumeFieldOption[] Returns an array of ResumeFieldOption objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ResumeFieldOption
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
