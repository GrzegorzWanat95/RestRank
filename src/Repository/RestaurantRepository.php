<?php

namespace App\Repository;

use App\Entity\Restaurant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Restaurant>
 *
 * @method Restaurant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Restaurant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Restaurant[]    findAll()
 * @method Restaurant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RestaurantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Restaurant::class);
    }

    public function add(Restaurant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Restaurant $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Comments[] Returns an array of Comments objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('Restaurant')
            ->andWhere('Restaurant.Name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    
   /*public function findOneBySomeField($value): ?Restaurant
    {
        return $this->createQueryBuilder('Restaurant')
            ->andWhere('Restaurant.Name = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }*/

    /*
    public function average($value): ?Restaurant
    {
        $q = $em->createQuery();
        $dql = "select AVG(t.value), DAY(t.createdAt)
                cdate  from MyProject\Model\Table t WHERE t.type=:param GROUP BY cdate";
        
        $q->setDql($dql)->setParameter('param', $param);
        ;
    }*/

}
