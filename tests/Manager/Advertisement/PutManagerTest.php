<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Manager\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\PutManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Manager\Advertisement\PutManager
 */
class PutManagerTest extends TestCase
{
    private PutManager $putManager;

    public function setUp(): void
    {
        $mockEntityManager = $this->createMock(EntityManagerInterface::class);
        $this->putManager = new PutManager($mockEntityManager);
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
        $advertisement = $this->putManager->put($advMock);
        $this->assertIsObject($advertisement);
    }

    /**
     * @throws Exception
     */
    public function testPutFailure(): void
    {
        $advMock = new Advertisement();
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->putManager->put($advMock);
        $this->assertIsObject($advertisement);
    }
}
