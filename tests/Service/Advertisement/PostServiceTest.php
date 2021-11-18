<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement;

use App\Entity\Advertisement;
use App\Manager\Advertisement\PostManager;
use App\Service\Advertisement\PostService;
use Exception;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Validation;

/**
 * @covers \App\Service\Advertisement\PostService
 */
class PostServiceTest extends TestCase
{
    private PostService $postService;

    public function setUp(): void
    {
        $mockManager = $this->createMock(PostManager::class);
        $validator = Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator();
        $this->postService = new PostService($validator, $mockManager);
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
        $advertisement = $this->postService->post($advMock);
        $this->assertIsArray($advertisement);
    }

    /**
     * @throws Exception
     */
    public function testPostFailure(): void
    {
        $advMock = new Advertisement();
        $advMock->setTitle('test');
        $advMock->setLink('https://test.com');
        $advertisement = $this->postService->post($advMock);
        $this->assertIsArray($advertisement);
    }
}
