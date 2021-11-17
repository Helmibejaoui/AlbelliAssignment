<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement\DeleteService;

use App\Entity\Advertisement;
use App\Service\Advertisement\DeleteService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class deleteTestPhpTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function invoke(bool $expected, int $favoriteId): void
    {
        echo PHP_EOL.DeleteService::class.'->delete([]): '.$expected.PHP_EOL;

        $entityManager = self::$container->get(EntityManagerInterface::class);
        /**
         * @var $advertisement Advertisement
         */
        $advertisement = $entityManager->getRepository(Advertisement::class)->find($favoriteId);
        /**
         * @var $deleteService DeleteService
         */
        $deleteService = self::$container->get(DeleteService::class);
        $data = $deleteService->delete($advertisement);

        $this->assertIsBool($data);
        $this->assertEquals($expected, $data);
    }

    /**
     * format string  bool expected: value to be returned, int advertisementId to be deleted.
     */
    public function provider(): array
    {
        return [
            [
                true,
                1,
            ],
        ];
    }
}
