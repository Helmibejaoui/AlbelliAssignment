<?php

namespace App\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\AdvertisementManager;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Exception;

class PostService
{
    private ValidatorInterface $validator;
    private AdvertisementManager $manager;

    public function __construct(
        ValidatorInterface   $validator,
        AdvertisementManager $manager)
    {
        $this->validator = $validator;
        $this->manager = $manager;
    }

    /**
     * @param Advertisement $advertisement
     * @return array
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