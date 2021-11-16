<?php

namespace App\Service\Advertisement;

use App\Manager\AdvertisementManager;


class ListService
{
    private AdvertisementManager $manager;

    public function __construct(AdvertisementManager $manager)
    {
        $this->manager = $manager;
    }

    public function getData(): array
    {
        return $this->manager->getData();

    }

}