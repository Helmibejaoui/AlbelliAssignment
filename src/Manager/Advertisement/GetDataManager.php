<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\GetDataManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

class GetDataManager implements GetDataManagerInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repository = $entityManager->getRepository(Advertisement::class);
    }

    public function getData(?array $filters = []): array
    {
        return $this->repository->findAdvertisements($filters);
    }
}
