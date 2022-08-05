<?php

namespace App\Repository;

use App\Entity\ManagerCommunicateRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ManagerCommunicateRequest>
 *
 * @method ManagerCommunicateRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagerCommunicateRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagerCommunicateRequest[]    findAll()
 * @method ManagerCommunicateRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagerCommunicateRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagerCommunicateRequest::class);
    }

    public function add(ManagerCommunicateRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ManagerCommunicateRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ManagerCommunicateRequest[] Returns an array of ManagerCommunicateRequest objects
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

//    public function findOneBySomeField($value): ?ManagerCommunicateRequest
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
