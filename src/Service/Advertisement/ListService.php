<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Manager\AdvertisementManager;
use App\ServiceInterface\Advertisement\ListServiceInterface;

class ListService implements ListServiceInterface
{
    private AdvertisementManager $manager;

    public function __construct(AdvertisementManager $manager)
    {
        $this->manager = $manager;
    }

    public function getData(?array $filters = []): array
    {
        return $this->manager->getData($filters);
    }
}
