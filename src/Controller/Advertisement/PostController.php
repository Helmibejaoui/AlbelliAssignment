<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Controller\Advertisement;

use App\Entity\Advertisement;
use App\Form\AdvertisementType;
use App\Service\Advertisement\PostService;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * add a new advertisement.
     *
     * @Route("/api/advertisements", name="api_advertisement_new", methods={"POST"})
     *
     * @throws Exception
     */
    public function __invoke(Request $request, PostService $postService): JsonResponse
    {
        $form = $this->createForm(
            AdvertisementType::class,
            new Advertisement()
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
            $result = $postService->post($form->getData());
            if (isset($result['success'])) {
                return new JsonResponse(['status' => 'ok', 'code' => Response::HTTP_CREATED, 'data' => $result], Response::HTTP_CREATED);
            }

            return new JsonResponse(['status' => 'ko', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'data' => $result], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return new JsonResponse(['status' => 'ko', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'data' => $form->getErrors()], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
