<?php


namespace App\Manager;


use App\Entity\Advertisement;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\Persistence\ObjectRepository;

class AdvertisementManager
{

    private ObjectRepository|EntityRepository $repository;
    private EntityManagerInterface $entityManager;

    public function __construct(
        EntityManagerInterface $entityManager,
    )
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Advertisement::class);
    }

    public function getData(?array $filters = []): array
    {
        return $this->repository->findAdvertisements($filters);
    }

    public function post(Advertisement $advertisement): Advertisement
    {
        $this->entityManager->persist($advertisement);
        $this->entityManager->flush();

        return $advertisement;
    }

    public function getAdvertisement(Advertisement $advertisement): array
    {
        return [
            'id' => $advertisement->getId(),
            'title' => $advertisement->getTitle(),
            'validUntil' => $advertisement->getValidUntil(),
            'link' => $advertisement->getLink()

        ];
    }

    public function put(Advertisement $advertisement): Advertisement
    {
        $this->entityManager->persist($advertisement);
        $this->entityManager->flush();

        return $advertisement;
    }


}