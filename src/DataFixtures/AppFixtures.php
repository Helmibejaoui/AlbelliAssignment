<?php

/*
 * @owner        : 20 mars street,Mateur, Bizerte, Tunisia
 * @contact      : bejaoui.helmi@gmail.com
 */

namespace App\DataFixtures;

use App\Entity\Advertisement;
use DateInterval;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Exception;

class AppFixtures extends Fixture
{
    /**
     * @throws Exception
     */
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; ++$i) {
            $currentDate = new DateTime('NOW');
            $advertisement = new Advertisement();
            $advertisement->setTitle('advertisement '.$i);
            $advertisement->setValidUntil($currentDate->add(new DateInterval('P'.($i + 1).'D')));
            $advertisement->setLink('https://test.com');
            $manager->persist($advertisement);
        }

        $manager->flush();
    }
}
