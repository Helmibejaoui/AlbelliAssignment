<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\ManagerInterface\Advertisement;

interface GetDataManagerInterface
{
    public function getData(?array $filters = []): array;
}
