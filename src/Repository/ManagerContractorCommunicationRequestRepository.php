<?php

namespace App\Repository;

use App\Entity\ManagerContractorCommunicationRequest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ManagerContractorCommunicationRequest>
 *
 * @method ManagerContractorCommunicationRequest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManagerContractorCommunicationRequest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManagerContractorCommunicationRequest[]    findAll()
 * @method ManagerContractorCommunicationRequest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManagerContractorCommunicationRequestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ManagerContractorCommunicationRequest::class);
    }

    public function add(ManagerContractorCommunicationRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ManagerContractorCommunicationRequest $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ManagerContractorCommunicationRequest[] Returns an array of ManagerContractorCommunicationRequest objects
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

//    public function findOneBySomeField($value): ?ManagerContractorCommunicationRequest
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
