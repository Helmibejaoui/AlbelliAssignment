<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\GetDataManagerInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;

class GetDataManager implements GetDataManagerInterface
{
    private ObjectRepository|EntityRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Advertisement::class);
    }

    public function getData(?array $filters = []): array
    {
        return $this->repository->findAllAdvertisements($filters);
    }
}
