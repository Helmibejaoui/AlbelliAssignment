<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Manager\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\PostManagerInterface;
use Doctrine\ORM\EntityManagerInterface;

class PostManager implements PostManagerInterface
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function post(Advertisement $advertisement): Advertisement
    {
        $this->entityManager->persist($advertisement);
        $this->entityManager->flush();

        return $advertisement;
    }
}
