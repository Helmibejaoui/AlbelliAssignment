<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\ServiceInterface\Advertisement;

interface ListServiceInterface
{
    public function getData(?array $filters = []): array;
}
