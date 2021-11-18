<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\DeleteManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

class DeleteManager implements DeleteManagerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function delete(Advertisement $advertisement): bool
    {
        $this->entityManager->remove($advertisement);
        $this->entityManager->flush();

        return true;
    }
}
