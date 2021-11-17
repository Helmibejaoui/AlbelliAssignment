<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\GetAdvertisementManagerInterface;
use App\ServiceInterface\Advertisement\GetServiceInterface;

class GetService implements GetServiceInterface
{
    private GetAdvertisementManagerInterface $manager;

    public function __construct(GetAdvertisementManagerInterface $advertisementManager)
    {
        $this->manager = $advertisementManager;
    }

    public function getData(Advertisement $advertisement): array
    {
        return $this->manager->getAdvertisement($advertisement);
    }
}
