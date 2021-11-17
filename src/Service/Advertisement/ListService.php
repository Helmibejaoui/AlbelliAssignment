<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\ManagerInterface\Advertisement\GetDataManagerInterface;
use App\ServiceInterface\Advertisement\ListServiceInterface;

class ListService implements ListServiceInterface
{
    private GetDataManagerInterface $manager;

    public function __construct(GetDataManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function getData(?array $filters = []): array
    {
        return $this->manager->getData($filters);
    }
}
