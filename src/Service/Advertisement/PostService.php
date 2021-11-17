<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\PostManagerInterface;
use App\ServiceInterface\Advertisement\PostServiceInterface;
use Exception;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PostService implements PostServiceInterface
{
    private ValidatorInterface $validator;
    private PostManagerInterface $manager;

    public function __construct(
        ValidatorInterface $validator,
        PostManagerInterface $manager
    ) {
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @throws Exception
     */
    public function post(Advertisement $advertisement): array
    {
        /**
         * @var $constraintViolationList ConstraintViolationList
         */
        $constraintViolationList = $this->validator->validate($advertisement);
        if (empty($constraintViolationList) || empty($constraintViolationList->count())) {
            $advertisement = $this->manager->post($advertisement);
        } else {
            $errors = [];
            foreach ($constraintViolationList->getIterator() as $constraintViolation) {
                $errors[$constraintViolation->getPropertyPath()] = $constraintViolation->getMessageTemplate();
            }
        }

        return $errors ?? ['success' => true, 'advertisementId' => $advertisement->getId()];
    }
}
