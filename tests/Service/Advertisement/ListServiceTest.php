<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement;

use App\Manager\Advertisement\GetDataManager;
use App\Service\Advertisement\ListService;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Service\Advertisement\ListService
 */
class ListServiceTest extends TestCase
{
    private ListService $listService;

    public function setUp(): void
    {
        $mockManager = $this->createMock(GetDataManager::class);
        $this->listService = new ListService($mockManager);
    }

    public function testGetData(): void
    {
        $advertisement = $this->listService->getData();
        $this->assertIsArray($advertisement);
    }
}
