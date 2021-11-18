<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\GetAdvertisementManager;
use App\Service\Advertisement\GetService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\Advertisement\GetService
 */
class GetServiceTest extends TestCase
{
    private GetService $getService;

    public function setUp(): void
    {
        $mockManager = $this->createMock(GetAdvertisementManager::class);
        $this->getService = new GetService($mockManager);
    }

    public function testGetData(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->getService->getData($advMock);
        $this->assertIsArray($advertisement);
    }
}
