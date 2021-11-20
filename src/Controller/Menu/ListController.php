<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Menu;

use App\ServiceInterface\Advertisement\ListServiceInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ListController
{
    /**
     * get list menu.
     *
     * @Route("/api/menu", name="api_menu_list", methods={"GET"})
     */
    public function __invoke(ListServiceInterface $listService, Request $request): JsonResponse
    {
        return new JsonResponse([['name' => 'Home', 'route' => '/'], ['name' => 'New advertisement', 'route' => '/advertisement/new']]);
    }
}
