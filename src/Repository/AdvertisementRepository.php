<?php

namespace App\Repository;

use App\Entity\Advertisement;
use App\Repository\Traits\Filter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\AbstractQuery;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Advertisement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Advertisement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Advertisement[]    findAll()
 * @method Advertisement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdvertisementRepository extends ServiceEntityRepository
{
    use Filter;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Advertisement::class);
    }

    public function findAdvertisements(?array $filters = [])
    {
        $filterMap = [
            'a.title' => [
                'placeholder' => 'title',
                'operator' => '=',
                'alias' => 'title',
            ],
            'a.link' => [
                'placeholder' => 'link',
                'operator' => '=',
                'alias' => 'link',
            ],
            'a.validUntil' => [
                'placeholder' => 'validUntil',
                'operator' => '=',
                'alias' => 'validUntil',
            ],
        ];
        $queryBuilder = $this->filterQueryBuilder(
            $this->createQueryBuilder('a')
                ->orderBy('a.validUntil', 'DESC'),
            $filterMap,
            $filters
        );

        return $queryBuilder->getQuery()
            ->getResult(AbstractQuery::HYDRATE_ARRAY);
    }
}
