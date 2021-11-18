<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Manager\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\GetAdvertisementManager;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Manager\Advertisement\GetAdvertisementManager
 */
class GetAdvertisementManagerTest extends TestCase
{
    private GetAdvertisementManager $getAdvertisementManager;

    public function setUp(): void
    {
        $this->getAdvertisementManager = new GetAdvertisementManager();
    }

    public function testAdvertisement(): void
    {
        $advMock = $this->createMock(Advertisement::class);
        $advMock->method('getId')->willReturn(10);
        $advMock->method('getTitle')->willReturn('test');
        $advMock->method('getLink')->willReturn('https://test.com');
        $advMock->method('getValidUntil')->willReturn(new \DateTime());
        $advertisement = $this->getAdvertisementManager->getAdvertisement($advMock);
        $this->assertIsArray($advertisement);
    }
}
