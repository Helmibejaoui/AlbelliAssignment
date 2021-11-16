<?php

namespace App\Controller\Advertisement;

use App\Service\Advertisement\ListService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ListController
{
    /**
     * @Route("/api/advertisements", name="api_advertisement_list", methods={"GET"})
     * @param ListService $listService
     * @return JsonResponse
     */
    public function __invoke(ListService $listService): JsonResponse
    {
        return new JsonResponse($listService->getData());
    }
}