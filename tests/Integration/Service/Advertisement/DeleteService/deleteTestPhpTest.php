<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Integration\Service\Advertisement\DeleteService;

use App\Entity\Advertisement;
use App\ServiceInterface\Advertisement\DeleteServiceInterface;
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
    public function invoke(bool $expected, int $advertisementId): void
    {
        echo PHP_EOL.DeleteServiceInterface::class.'->delete([]): '.$expected.PHP_EOL;

        $entityManager = self::$container->get(EntityManagerInterface::class);
        /**
         * @var $advertisement Advertisement
         */
        $advertisement = $entityManager->getRepository(Advertisement::class)->find($advertisementId);
        /**
         * @var $deleteService DeleteServiceInterface
         */
        $deleteService = self::$container->get(DeleteServiceInterface::class);
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
