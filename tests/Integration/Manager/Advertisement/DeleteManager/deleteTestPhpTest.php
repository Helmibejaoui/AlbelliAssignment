<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Integration\Manager\Advertisement\DeleteManager;

use App\Entity\Advertisement;
use App\ManagerInterface\Advertisement\DeleteManagerInterface;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class deleteTestPhpTest extends TestCase
{
    /**
     * @test
     * @dataProvider provider
     */
    public function invoke(bool $expected, int $advertisementId): void
    {
        echo PHP_EOL.DeleteManagerInterface::class.'->delete([]): '.$expected.PHP_EOL;

        $entityManager = self::$container->get(EntityManagerInterface::class);
        /**
         * @var $advertisement Advertisement
         */
        $advertisement = $entityManager->getRepository(Advertisement::class)->find($advertisementId);
        /**
         * @var $deleteManager DeleteManagerInterface
         */
        $deleteManager = self::$container->get(DeleteManagerInterface::class);
        $data = $deleteManager->delete($advertisement);

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
