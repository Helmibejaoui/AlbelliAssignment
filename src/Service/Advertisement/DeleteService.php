<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\DeleteManagerInterface;
use App\ServiceInterface\Advertisement\DeleteServiceInterface;

class DeleteService implements DeleteServiceInterface
{
    private DeleteManagerInterface $manager;

    public function __construct(DeleteManagerInterface $advertisementManager)
    {
        $this->manager = $advertisementManager;
    }

    public function delete(Advertisement $advertisement): bool
    {
        return $this->manager->delete($advertisement);
    }
}
