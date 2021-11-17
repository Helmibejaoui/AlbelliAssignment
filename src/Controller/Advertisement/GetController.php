<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Advertisement;

use App\Entity\Advertisement;
use App\ServiceInterface\Advertisement\GetServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetController
{
    /**
     * Get advertisement.
     *
     * @Route("/api/advertisements/{id}", name="api_advertisement_get", methods={"GET"}, options={"expose": true})
     * @ParamConverter("advertisement", options={"id": "id"})
     */
    public function __invoke(GetServiceInterface $getService, Advertisement $advertisement): JsonResponse
    {
        return new JsonResponse($getService->getData($advertisement));
    }
}
