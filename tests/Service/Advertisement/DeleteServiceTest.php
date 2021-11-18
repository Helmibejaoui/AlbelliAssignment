<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\DeleteManager;
use App\Service\Advertisement\DeleteService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\Advertisement\DeleteService
 */
class DeleteServiceTest extends TestCase
{
    private DeleteService $deleteService;

    public function setUp(): void
    {
        $mockManager = $this->createMock(DeleteManager::class);
        $this->deleteService = new DeleteService($mockManager);
    }

    public function testDelete(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->deleteService->delete($advMock);
        $this->assertIsBool($advertisement);
    }
}
