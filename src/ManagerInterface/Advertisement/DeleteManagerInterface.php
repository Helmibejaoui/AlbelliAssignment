<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\ManagerInterface\Advertisement;

use App\Entity\Advertisement;

interface DeleteManagerInterface
{
    public function delete(Advertisement $advertisement);
}
