<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Manager\AdvertisementManager;

class ListService
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
