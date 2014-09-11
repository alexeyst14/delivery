<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 12:41
 */

namespace Avkdev\DeliveryBundle\DataFixtures\ORM;

use Avkdev\DeliveryBundle\Entity\City;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCityData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }

    /**
     * Load data fixtures with the passed EntityManager
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $arr = [
            'Днепропетровск',
            'Донецк',
            'Запорожье',
            'Киев',
            'Львов',
        ];

        $sities = [];

        foreach ($arr as $v) {
            $city = new City();
            $city->setName($v);
            $manager->persist($city);
            $sities[] = $city;
        }

        $i = 1;
        foreach ($sities as $city) {
            $this->addReference("City" . $i++, $city);
        }

        $manager->flush();
    }
}
