<?php

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\AdvertisementManager;

class GetService
{
    private AdvertisementManager $manager;

    public function __construct(AdvertisementManager $advertisementManager)
    {
        $this->manager = $advertisementManager;
    }

    public function getData(Advertisement $advertisement): array
    {
        return $this->manager->getAdvertisement($advertisement);
    }
}
