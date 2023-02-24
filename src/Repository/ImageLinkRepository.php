<?php

namespace App\Repository;

use App\Entity\ImageLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageLink>
 *
 * @method ImageLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageLink[]    findAll()
 * @method ImageLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageLink::class);
    }

    public function save(ImageLink $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ImageLink $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ImageLink[] Returns an array of ImageLink objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ImageLink
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
