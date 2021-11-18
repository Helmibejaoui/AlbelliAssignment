<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Manager\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\DeleteManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * @covers  \App\Manager\Advertisement\DeleteManager
 */
class DeleteManagerTest extends TestCase
{
    private DeleteManager $deleteManager;

    public function setUp(): void
    {
        $mockEntityManager = $this->createMock(EntityManagerInterface::class);
        $this->deleteManager = new DeleteManager($mockEntityManager);
    }

    public function testDelete(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->deleteManager->delete($advMock);
        $this->assertIsBool($advertisement);
    }
}
