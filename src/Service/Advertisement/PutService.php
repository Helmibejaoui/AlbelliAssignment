<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\AdvertisementManager;
use App\ServiceInterface\Advertisement\PutServiceInterface;
use Exception;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PutService implements PutServiceInterface
{
    private ValidatorInterface $validator;
    private AdvertisementManager $manager;

    public function __construct(
        ValidatorInterface $validator,
        AdvertisementManager $manager
    ) {
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @throws Exception
     */
    public function put(Advertisement $advertisement): array
    {
        /**
         * @var $constraintViolationList ConstraintViolationList
         */
        $constraintViolationList = $this->validator->validate($advertisement);
        if (empty($constraintViolationList) || empty($constraintViolationList->count())) {
            $advertisement = $this->manager->put($advertisement);
        } else {
            $errors = [];
            foreach ($constraintViolationList->getIterator() as $constraintViolation) {
                $errors[$constraintViolation->getPropertyPath()] = $constraintViolation->getMessageTemplate();
            }
        }

        return $errors ?? ['success' => true, 'advertisementId' => $advertisement->getId()];
    }
}
