<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\Tests\Integration\Manager\Advertisement\GetDataManager;

use App\Entity\Advertisement;
use App\ServiceInterface\Advertisement\ListServiceInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class getDataTestPhpTest extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();
    }

    /**
     * @test
     * @dataProvider provider
     */
    public function invoke(array $expected): void
    {
        $listService = self::$container->get(ListServiceInterface::class);

        echo PHP_EOL.ListServiceInterface::class.'->getData('.Advertisement::class.'): array'.PHP_EOL;

        $data = $listService->getData();
        $advertisements = array_reduce($data, function ($advertisements, $advertisement) {
            if (!is_array($advertisements)) {
                $advertisements = [];
            }

            $advertisements[] = $advertisement['title'];

            return $advertisements;
        }, []);
        $this->assertIsArray($data);
        $this->assertEquals(implode(',', $expected), implode(',', $advertisements));
    }

    /**
     * format string array expected: list of advertisements to be returned (as advertisements title).
     */
    public function provider(): array
    {
        return [
            [['advertisement 19',
                'advertisement 18',
                'advertisement 17',
                'advertisement 16',
                'advertisement 15',
                'advertisement 14',
                'advertisement 13',
                'advertisement 12',
                'advertisement 11',
                'advertisement 10',
                'advertisement 9',
                'advertisement 8',
                'advertisement 7',
                'advertisement 6',
                'advertisement 5',
                'advertisement 4',
                'advertisement 3',
                'advertisement 2',
                'advertisement 1',
                /*'advertisement 0', */]],
        ];
    }
}
