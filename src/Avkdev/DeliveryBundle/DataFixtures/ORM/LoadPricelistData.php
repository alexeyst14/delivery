<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 12:48
 */

namespace Avkdev\DeliveryBundle\DataFixtures\ORM;


use Avkdev\DeliveryBundle\Entity\Pricelist;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPricelistData extends AbstractFixture implements OrderedFixtureInterface
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
        for ($i = 1; $i <=3; $i++) {
            for ($j = 0; $j <= 10; $j++) {
                $pl = new Pricelist();
                $pl->setCompany($this->getReference('Company'.$i))
                    ->setParcelCost($j * 10)
                    ->setSize($j * 2)
                    ->setWeight($j * 2)
                    ->setCost(round($j * 10 + 15 + $j * (mt_rand() / mt_getrandmax()), 2));
                $manager->persist($pl);
            }
        }
        $manager->flush();
    }

}
