<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\GetAdvertisementManagerInterface;

class GetAdvertisementManager implements GetAdvertisementManagerInterface
{
    public function getAdvertisement(Advertisement $advertisement): array
    {
        return [
            'id' => $advertisement->getId(),
            'title' => $advertisement->getTitle(),
            'validUntil' => $advertisement->getValidUntil(),
            'link' => $advertisement->getLink(),
        ];
    }
}
