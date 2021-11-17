<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Service\Advertisement\GetService;

use App\Entity\Advertisement;
use App\ServiceInterface\Advertisement\GetServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class getDataTestPhpTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
    }

    /**
     * @test
     */
    public function invoke(): void
    {
        $entityManager = self::$container->get(EntityManagerInterface::class);
        $getService = self::$container->get(GetServiceInterface::class);

        /**
         * @var Advertisement $advertisement
         */
        $advertisement = $entityManager->getRepository(Advertisement::class)->find(2);
        echo PHP_EOL.GetServiceInterface::class.'->getData('.Advertisement::class.' '.$advertisement->getId().'): array'.PHP_EOL;

        $data = $getService->getData($advertisement);

        $this->assertIsArray($data);
        $this->assertCount(4, $data);
        $this->assertEquals($data['id'], $advertisement->getId());
    }
}
