<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Advertisement;

use App\Service\Advertisement\ListService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController
{
    /**
     * get list advertisement.
     *
     * @Route("/api/advertisements", name="api_advertisement_list", methods={"GET"})
     */
    public function __invoke(ListService $listService, Request $request): JsonResponse
    {
        return new JsonResponse($listService->getData($request->query->all()));
    }
}
