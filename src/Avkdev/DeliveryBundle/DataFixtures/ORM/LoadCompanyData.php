<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 10.09.14
 * Time: 12:31
 */

namespace Avkdev\DeliveryBundle\DataFixtures\ORM;


use Avkdev\DeliveryBundle\Entity\Company;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCompanyData extends AbstractFixture implements OrderedFixtureInterface
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
            'Новая Почта',
            'Укрпочта',
            'Интайм',
            'Гюнсел',
        ];

        $companies = [];

        $dataSource = Company::DATA_SOURCE_API;
        $i = 0;
        foreach ($arr as $v) {
            $company = new Company();
            $company->setName($v);
            $company->setDataSource(Company::DATA_SOURCE_API);
            if ($i > 1) {
                $company->setDataSource(Company::DATA_SOURCE_DATABASE);
            } else {
                $company->setApiClass('ApiNewPostStrategy');
            }
            $manager->persist($company);
            $companies[] = $company;
            $i++;
        }

        $i = 1;
        foreach ($companies as $company) {
            $this->addReference("Company" . $i++, $company);
        }
        $manager->flush();
    }
}
