<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Advertisement;

use App\Entity\Advertisement;
use App\Form\AdvertisementType;
use App\Service\Advertisement\PutService;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PutController extends AbstractController
{
    /**
     * update an existing advertisement.
     *
     * @Route("/api/advertisements/{id}", name="api_advertisement_put", methods={"PUT"})
     * @ParamConverter("advertisement", options={"id": "id"})
     *
     * @throws Exception
     */
    public function __invoke(Request $request, PutService $putService, Advertisement $advertisement): JsonResponse
    {
        $form = $this->createForm(
            AdvertisementType::class,
            $advertisement
        );
        $form->submit(json_decode($request->getContent(), true));
        $form->handleRequest($request);
        $form->isValid();
        if (
            $form->isSubmitted() && (!$form->getErrors() ||
                (
                    $form->getErrors() &&
                    0 === $form->getErrors()->count()
                ))) {
            $result = $putService->put($form->getData());
            if (isset($result['success'])) {
                return new JsonResponse(['status' => 'ok', 'code' => Response::HTTP_CREATED, 'data' => $result], Response::HTTP_CREATED);
            }

            return new JsonResponse(['status' => 'ko', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'data' => $result], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse(['status' => 'ko', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'data' => $form->getErrors()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
