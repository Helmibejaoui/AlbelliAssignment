<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\AdvertisementManager;
use App\ServiceInterface\Advertisement\GetServiceInterface;

class GetService implements GetServiceInterface
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
