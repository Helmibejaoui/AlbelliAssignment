<?php

namespace App\Controller\Advertisement;

use App\Service\Advertisement\ListService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController
{
    /**
     * @Route("/api/advertisements", name="api_advertisement_list", methods={"GET"})
     * @param ListService $listService
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(ListService $listService, Request $request): JsonResponse
    {
        return new JsonResponse($listService->getData($request->query->all()));
    }
}