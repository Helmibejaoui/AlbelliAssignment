<?php

namespace App\Controller\Advertisement;

use App\Entity\Advertisement;
use App\Service\Advertisement\GetService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class GetController
{
    /**
     * Get user.
     *
     * @Route("/api/advertisements/{id}", name="api_advertisement_get", methods={"GET"},options={"expose": true})
     * @ParamConverter("advertisement", options={"id": "id"})
     */
    public function __invoke(GetService $getService, Advertisement $user): JsonResponse
    {
        return new JsonResponse($getService->getData($user));
    }
}
