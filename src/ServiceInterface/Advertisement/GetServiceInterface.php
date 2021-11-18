<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\ServiceInterface\Advertisement;

use App\Entity\Advertisement;

interface GetServiceInterface
{
    public function getData(Advertisement $advertisement): array;
}
