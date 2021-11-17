<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\AdvertisementManager;

class DeleteService
{
    private AdvertisementManager $manager;

    public function __construct(AdvertisementManager $advertisementManager)
    {
        $this->manager = $advertisementManager;
    }

    public function delete(Advertisement $advertisement): bool
    {
        return $this->manager->delete($advertisement);
    }
}
