<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\PutManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PutManager implements PutManagerInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function put(Advertisement $advertisement): Advertisement
    {
        $this->entityManager->persist($advertisement);
        $this->entityManager->flush();

        return $advertisement;
    }
}
