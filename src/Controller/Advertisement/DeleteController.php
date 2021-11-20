<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Advertisement;

use App\Entity\Advertisement;
use App\ServiceInterface\Advertisement\DeleteServiceInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DeleteController
{
    /**
     * delete advertisement.
     *
     * @Route("/api/advertisements/{id}", name="api_advertisement_delete", methods={"DELETE"}, options={"expose": true})
     * @ParamConverter("advertisement", options={"id": "id"})
     */
    public function __invoke(DeleteServiceInterface $deleteService, Advertisement $advertisement): JsonResponse
    {
        return new JsonResponse($deleteService->delete($advertisement));
    }
}
