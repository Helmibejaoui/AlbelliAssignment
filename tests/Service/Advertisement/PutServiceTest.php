<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\PutManager;
use App\Service\Advertisement\PutService;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @covers \App\Service\Advertisement\PutService
 */
class PutServiceTest extends TestCase
{
    private PutService $putService;

    public function setUp(): void
    {
        $mockManager = $this->createMock(PutManager::class);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $this->putService = new PutService($validator, $mockManager);
    }

    /**
     * @throws Exception
     */
    public function testPutSuccess(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->putService->put($advMock);
        $this->assertIsArray($advertisement);
    }

    /**
     * @throws Exception
     */
    public function testPutFailure(): void
    {
        $advMock = new Advertisement();
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->putService->put($advMock);
        $this->assertIsArray($advertisement);
    }
}
