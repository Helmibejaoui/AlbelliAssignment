<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Manager\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\PostManager;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * @covers \App\Manager\Advertisement\PostManager
 */
class PostManagerTest extends TestCase
{
    private PostManager $postManager;

    public function setUp(): void
    {
        $mockEntityManager = $this->createMock(EntityManagerInterface::class);
        $this->postManager = new PostManager($mockEntityManager);
    }

    /**
     * @throws Exception
     */
    public function testPostSuccess(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setValidUntil(new \DateTime('NOW'));
        $advMock->setLink('https://test.com');
        $advertisement = $this->postManager->post($advMock);
        $this->assertIsObject($advertisement);
    }

    /**
     * @throws Exception
     */
    public function testPostFailure(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setLink('https://test.com');
        $advertisement = $this->postManager->post($advMock);
        $this->assertIsObject($advertisement);
    }
}
