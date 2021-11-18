<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Manager\Advertisement;

use App\Manager\Advertisement\GetDataManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Manager\Advertisement\GetDataManager
 */
class GetDataManagerTest extends TestCase
{
    private GetDataManager $getDataManager;

    public function setUp(): void
    {
        $repositoryMock = $this
            ->getMockBuilder(EntityRepository::class)
            ->setMethods(['findAllAdvertisements'])
            ->disableOriginalConstructor()
            ->getMock();
        $repositoryMock->expects($this->any())->will($this->returnValue([]));
        $mockEntityManager = $this->createMock(EntityManagerInterface::class);
        $mockEntityManager->method('getRepository')->willReturn($repositoryMock);
        $this->getDataManager = new GetDataManager($mockEntityManager);
    }

    public function testGetData(): void
    {
        $advertisement = $this->getDataManager->getData();
        $this->assertIsArray($advertisement);
    }
}
