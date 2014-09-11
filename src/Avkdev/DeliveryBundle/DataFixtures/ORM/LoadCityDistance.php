<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 13:09
 */

namespace Avkdev\DeliveryBundle\DataFixtures\ORM;


use Avkdev\DeliveryBundle\Entity\CityDistance;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCityDistance extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Get the order of this fixture
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * Load data fixtures with the passed EntityManager
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $dist = new CityDistance();
                $dist
                    ->setCostIdx($i * $j / 100 * mt_rand(1,20) + 1)
                    ->setDepartureCity($this->getReference('City' . $i))
                    ->setArrivalCity($this->getReference('City' . $j))
                    ->setDeliveryTime(mt_rand(2,6));
                $manager->persist($dist);
            }
        }
        $manager->flush();
    }

}
